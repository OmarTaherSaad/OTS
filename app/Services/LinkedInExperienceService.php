<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LinkedInExperienceService
{
    private ?array $cachedEducation = null;

    public function getExperiences(bool $allowStale = true): array
    {
        $payload = $this->readCachedPayload($allowStale);
        $experiences = $payload['experiences'] ?? [];

        if (empty($experiences)) {
            $experiences = $this->buildFallbackExperiences();
        } else {
            $experiences = $this->mergeEnrichments($experiences);
        }

        return $this->attachLogoUrls($experiences);
    }

    public function getEducation(bool $allowStale = true): array
    {
        if ($this->cachedEducation !== null) {
            return $this->cachedEducation;
        }

        $payload = $this->readCachedPayload($allowStale);

        return $payload['education'] ?? config('linkedin.education_fallback');
    }

    public function sync(bool $force = false): array
    {
        if (! $force && $this->cacheFileIsFresh()) {
            $existing = $this->readCachedPayload(true);
            if (! empty($existing['experiences'])) {
                Cache::put($this->cacheKey(), $existing, $this->cacheTtl());

                return $existing['experiences'];
            }
        }

        $profile = $this->fetchApifyProfile()
            ?? $this->fetchLinkedInExportProfile();

        if ($profile === null) {
            throw new \RuntimeException(
                'Could not fetch LinkedIn profile. Set APIFY_API_TOKEN or place a Positions.json export at '
                . config('linkedin.export_path')
            );
        }

        $experiences = $this->extractExperiencesFromProfile($profile);
        $education = $this->extractEducationFromProfile($profile);

        if (empty($experiences)) {
            throw new \RuntimeException('LinkedIn profile fetched but no experience entries were found.');
        }

        $experiences = $this->mergeEnrichments($experiences);

        $payload = [
            'synced_at' => now()->toIso8601String(),
            'experiences' => $experiences,
            'education' => $education ?? config('linkedin.education_fallback'),
        ];

        $this->writeCacheFile($payload);
        Cache::put($this->cacheKey(), $payload, $this->cacheTtl());
        $this->cachedEducation = $payload['education'];

        return $experiences;
    }

    private function readCachedPayload(bool $allowStale): array
    {
        $cached = Cache::get($this->cacheKey());
        if (is_array($cached)) {
            if (! empty($cached['experiences'])) {
                $this->cachedEducation = $cached['education'] ?? null;

                return $cached;
            }

            if (array_is_list($cached) && ! empty($cached)) {
                return [
                    'experiences' => $this->mergeEnrichments($cached),
                    'education' => config('linkedin.education_fallback'),
                ];
            }
        }

        $fromFile = $this->readCacheFile();
        if ($fromFile !== null) {
            $fresh = $this->cacheFileIsFresh();

            if ($fresh || $allowStale) {
                if (! $fresh) {
                    Log::info('Using stale LinkedIn experience cache; run linkedin:sync-experience to refresh.');
                }

                Cache::put($this->cacheKey(), $fromFile, $this->cacheTtl());
                $this->cachedEducation = $fromFile['education'] ?? null;

                return $fromFile;
            }
        }

        return ['experiences' => [], 'education' => config('linkedin.education_fallback')];
    }

    private function fetchApifyProfile(): ?array
    {
        $token = config('linkedin.apify.token');
        if (empty($token)) {
            return null;
        }

        $profileUrl = config('linkedin.profile_url');
        $actor = str_replace('/', '~', config('linkedin.apify.actor'));
        $timeout = config('linkedin.apify.timeout');
        $inputKey = $this->apifyInputKey();

        $response = Http::timeout($timeout)
            ->post(
                "https://api.apify.com/v2/acts/{$actor}/run-sync-get-dataset-items?token={$token}",
                [$inputKey => [$profileUrl]]
            );

        if (! $response->successful()) {
            Log::warning('Apify LinkedIn scrape failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        }

        $items = $response->json();
        if (! is_array($items) || empty($items)) {
            return null;
        }

        $profile = $items[0];

        return isset($profile['profile']) && is_array($profile['profile'])
            ? $profile['profile']
            : $profile;
    }

    private function fetchLinkedInExportProfile(): ?array
    {
        $path = config('linkedin.export_path');
        if (! is_readable($path)) {
            return null;
        }

        $payload = json_decode(file_get_contents($path), true);
        if (! is_array($payload)) {
            return null;
        }

        return ['experience' => array_is_list($payload) ? $payload : ($payload['elements'] ?? [$payload])];
    }

    private function extractExperiencesFromProfile(array $profile): array
    {
        $rows = [];

        foreach (['experience', 'experiences', 'workExperience'] as $key) {
            if (! empty($profile[$key]) && is_array($profile[$key])) {
                $rows = array_merge($rows, $this->flattenExperienceRows($profile[$key]));
            }
        }

        if (empty($rows) && ! empty($profile['position_groups']) && is_array($profile['position_groups'])) {
            $rows = $this->flattenPositionGroups($profile['position_groups']);
        }

        if (empty($rows) && isset($profile['experienceData']['experiences'])) {
            $rows = $this->flattenExperienceRows($profile['experienceData']['experiences']);
        }

        $experiences = [];
        foreach ($rows as $row) {
            $normalized = $this->normalizeExperienceRow($row);
            if ($normalized !== null) {
                $experiences[] = $normalized;
            }
        }

        return $experiences;
    }

    private function flattenExperienceRows(array $rows): array
    {
        $flat = [];

        foreach ($rows as $row) {
            if (! is_array($row)) {
                continue;
            }

            $nested = $row['positions'] ?? $row['profile_positions'] ?? null;
            if (is_array($nested) && ! empty($nested)) {
                $company = $row['company'] ?? $row['companyName'] ?? $row['company_name'] ?? [];
                $companyName = is_array($company)
                    ? ($company['name'] ?? $company['companyName'] ?? '')
                    : (string) ($row['company_name'] ?? $row['company'] ?? $row['companyName'] ?? '');

                foreach ($nested as $position) {
                    if (! is_array($position)) {
                        continue;
                    }

                    $flat[] = array_merge($position, [
                        'company' => $position['company'] ?? $companyName,
                        'companyName' => $position['company'] ?? $companyName,
                        'company_name' => $position['company'] ?? $companyName,
                        'logoUrl' => $position['logoUrl'] ?? $row['logoUrl'] ?? $row['company_logo'] ?? null,
                        'companyLogo' => $position['companyLogo'] ?? $row['companyLogo'] ?? $row['company_logo'] ?? null,
                    ]);
                }

                continue;
            }

            $flat[] = $row;
        }

        return $flat;
    }

    private function flattenPositionGroups(array $groups): array
    {
        $flat = [];

        foreach ($groups as $group) {
            if (! is_array($group)) {
                continue;
            }

            $company = $group['company'] ?? [];
            $companyName = is_array($company) ? ($company['name'] ?? '') : (string) $company;
            $logo = is_array($company) ? ($company['logo'] ?? null) : null;
            $positions = $group['profile_positions'] ?? $group['positions'] ?? [];

            foreach ($positions as $position) {
                if (! is_array($position)) {
                    continue;
                }

                $flat[] = array_merge($position, [
                    'company' => $position['company'] ?? $companyName,
                    'companyName' => $position['company'] ?? $companyName,
                    'company_name' => $position['company'] ?? $companyName,
                    'logoUrl' => $logo,
                ]);
            }
        }

        return $flat;
    }

    private function normalizeExperienceRow(array $row): ?array
    {
        $company = trim((string) (
            $row['company']
            ?? $row['companyName']
            ?? $row['company_name']
            ?? $row['Company Name']
            ?? $row['subtitle']
            ?? ''
        ));
        $role = trim((string) ($row['title'] ?? $row['jobTitle'] ?? $row['Title'] ?? ''));

        if ($company === '' && $role === '') {
            return null;
        }

        if ($company !== '' && $role !== '' && strcasecmp($company, $role) === 0) {
            $role = trim((string) ($row['subtitle'] ?? $row['headline'] ?? $role));
        }

        $slug = Str::slug($company);
        $stillWorking = (bool) ($row['is_current'] ?? $row['jobStillWorking'] ?? false);

        return [
            'role' => $role,
            'company' => $company,
            'period' => $this->formatPeriod(
                $row['dateRange'] ?? $row['caption'] ?? $row['dates'] ?? null,
                $row['startDate'] ?? $row['start_date'] ?? $row['jobStartedOn'] ?? $row['Started On'] ?? null,
                $row['endDate'] ?? $row['end_date'] ?? $row['jobEndedOn'] ?? $row['Finished On'] ?? null,
                $stillWorking
            ),
            'location' => trim((string) ($row['location'] ?? $row['jobLocation'] ?? $row['Location'] ?? '')),
            'logo' => $slug,
            'logo_url' => $row['logoUrl'] ?? $row['companyLogo'] ?? $row['company_logo'] ?? null,
            'highlights' => $this->descriptionToHighlights(
                $row['description'] ?? $row['jobDescription'] ?? $row['Description'] ?? ''
            ),
            'tags' => [],
        ];
    }

    private function extractEducationFromProfile(array $profile): ?array
    {
        $rows = $profile['education'] ?? $profile['educations'] ?? $profile['educationHistory'] ?? [];
        if (! is_array($rows) || empty($rows)) {
            return null;
        }

        $entry = $rows[0];
        if (! is_array($entry)) {
            return null;
        }

        $school = trim((string) (
            $entry['school_name']
            ?? $entry['schoolName']
            ?? $entry['school']
            ?? (is_array($entry['school'] ?? null) ? ($entry['school']['name'] ?? '') : '')
            ?? $entry['institution']
            ?? ''
        ));

        $degree = trim((string) (
            $entry['degree_field']
            ?? $entry['degreeName']
            ?? $entry['degree']
            ?? $entry['degree_name']
            ?? ''
        ));

        $field = trim((string) ($entry['fieldOfStudy'] ?? $entry['field_of_study'] ?? ''));
        if ($degree !== '' && $field !== '' && ! str_contains($degree, $field)) {
            $degree .= ' — ' . $field;
        }

        $duration = trim((string) (
            $entry['dates']
            ?? $this->formatPeriod(
                null,
                $entry['startYear'] ?? $entry['start_date'] ?? null,
                $entry['endYear'] ?? $entry['end_date'] ?? null
            )
        ));

        if ($school === '' && $degree === '') {
            return null;
        }

        return [
            'degree' => $degree !== '' ? $degree : $school,
            'university' => $school,
            'location' => trim((string) ($entry['location'] ?? '')),
            'duration' => str_replace([' - ', ' – '], ' – ', $duration),
            'project' => config('linkedin.education_fallback.project'),
        ];
    }

    private function mergeEnrichments(array $experiences): array
    {
        $enrichments = config('linkedin.enrichments', []);

        foreach ($experiences as &$exp) {
            $match = $this->findEnrichment($enrichments, $exp);

            if ($match === null) {
                continue;
            }

            if (empty($exp['highlights']) && ! empty($match['highlights'])) {
                $exp['highlights'] = $match['highlights'];
            }

            if (empty($exp['period']) && ! empty($match['period'])) {
                $exp['period'] = $match['period'];
            }

            if (empty($exp['location']) && ! empty($match['location'])) {
                $exp['location'] = $match['location'];
            }

            if (! empty($match['tags'])) {
                $exp['tags'] = $match['tags'];
            }

            if (! empty($match['logo'])) {
                $exp['logo'] = $match['logo'];
            }
        }
        unset($exp);

        return $experiences;
    }

    private function findEnrichment(array $enrichments, array $exp): ?array
    {
        $companyKey = $this->normalizeCompanyKey($exp['company'] ?? '');
        $roleKey = Str::slug($exp['role'] ?? '');

        if (isset($enrichments["{$companyKey}|{$roleKey}"])) {
            return $enrichments["{$companyKey}|{$roleKey}"];
        }

        foreach ($enrichments as $key => $data) {
            if (! str_contains($key, '|')) {
                continue;
            }

            [$entryCompany, $entryRole] = explode('|', $key, 2);
            if ($entryCompany === $companyKey && $this->rolesMatch($entryRole, $roleKey)) {
                return $data;
            }
        }

        return $enrichments[$companyKey] ?? null;
    }

    private function normalizeCompanyKey(string $company): string
    {
        $company = trim(explode('·', $company)[0]);

        return Str::slug($company);
    }

    private function rolesMatch(string $expectedRoleSlug, string $actualRoleSlug): bool
    {
        if ($expectedRoleSlug === $actualRoleSlug) {
            return true;
        }

        $normalize = static fn (string $slug) => str_replace(['back-end', 'full-stack'], ['backend', 'fullstack'], $slug);

        return $normalize($expectedRoleSlug) === $normalize($actualRoleSlug);
    }

    private function buildFallbackExperiences(): array
    {
        $enrichments = config('linkedin.enrichments', []);
        $fallback = [];

        foreach ($enrichments as $key => $data) {
            if (! str_contains($key, '|')) {
                continue;
            }

            $fallback[] = [
                'role' => $data['role'] ?? '',
                'company' => $data['company'] ?? '',
                'period' => $data['period'] ?? '',
                'location' => $data['location'] ?? '',
                'logo' => $data['logo'] ?? Str::slug($data['company'] ?? ''),
                'logo_url' => null,
                'highlights' => $data['highlights'] ?? [],
                'tags' => $data['tags'] ?? [],
            ];
        }

        return $fallback;
    }

    private function apifyInputKey(): string
    {
        $actor = (string) config('linkedin.apify.actor');

        if (str_contains($actor, 'clearpath') || str_contains($actor, 'atomus') || str_contains($actor, 'dev_fusion')) {
            return 'profileUrls';
        }

        return 'profiles';
    }

    private function formatPeriod(?string $dateRange, mixed $start, mixed $end, bool $stillWorking = false): string
    {
        if (is_string($dateRange) && trim($dateRange) !== '') {
            $normalized = str_replace([' - ', ' – ', ' · '], ' – ', trim($dateRange));
            $normalized = preg_replace('/\s*–\s*Present/i', ' – Present', $normalized) ?? $normalized;

            return $normalized;
        }

        $startLabel = $this->formatDateLabel($start);
        $endLabel = $stillWorking || $this->isPresent($end) ? 'Present' : $this->formatDateLabel($end);

        if ($startLabel && $endLabel) {
            return "{$startLabel} – {$endLabel}";
        }

        return $startLabel ?: ($endLabel ?: '');
    }

    private function formatDateLabel(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if ($this->isPresent($value)) {
            return 'Present';
        }

        if (is_numeric($value)) {
            return (string) $value;
        }

        $value = trim((string) $value);

        if (preg_match('/^(\d{4})-(\d{2})$/', $value, $m)) {
            return $this->monthName((int) $m[2]) . ' ' . $m[1];
        }

        if (preg_match('/^\d{4}$/', $value)) {
            return $value;
        }

        return $value;
    }

    private function isPresent(mixed $value): bool
    {
        if ($value === null || $value === '') {
            return false;
        }

        return is_string($value) && preg_match('/present|current/i', $value);
    }

    private function monthName(int $month): string
    {
        static $names = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec',
        ];

        return $names[$month] ?? 'Jan';
    }

    private function descriptionToHighlights(string $description): array
    {
        $description = trim(html_entity_decode(strip_tags($description)));
        if ($description === '') {
            return [];
        }

        $description = preg_replace("/\r\n|\r|\n/", "\n", $description) ?? $description;
        $chunks = preg_split("/\n+|(?:\s*•\s*)|(?:\s*-\s+)/", $description) ?: [];
        $highlights = [];

        foreach ($chunks as $chunk) {
            $chunk = trim($chunk, " \t\n\r\0\x0B•-");
            if ($chunk !== '' && strlen($chunk) > 2) {
                $highlights[] = $chunk;
            }
        }

        if (empty($highlights)) {
            return [$description];
        }

        return $highlights;
    }

    private function attachLogoUrls(array $experiences): array
    {
        foreach ($experiences as &$exp) {
            if (! empty($exp['logo_url'])) {
                continue;
            }

            $slug = $exp['logo'] ?? null;
            $exp['logo_url'] = null;

            if (! $slug) {
                continue;
            }

            foreach (['svg', 'png', 'webp', 'jpg', 'jpeg'] as $ext) {
                $rel = "images/companies/{$slug}.{$ext}";
                if (file_exists(public_path($rel))) {
                    $exp['logo_url'] = asset($rel);
                    break;
                }
            }
        }
        unset($exp);

        return $experiences;
    }

    private function cacheKey(): string
    {
        return 'linkedin.profile.' . md5((string) config('linkedin.profile_url'));
    }

    private function cacheTtl(): int
    {
        return max(300, (int) config('linkedin.cache_ttl'));
    }

    private function readCacheFile(): ?array
    {
        $path = config('linkedin.cache_path');
        if (! is_readable($path)) {
            return null;
        }

        $data = json_decode(file_get_contents($path), true);
        if (! is_array($data)) {
            return null;
        }

        if (array_is_list($data)) {
            return [
                'experiences' => $this->mergeEnrichments($data),
                'education' => config('linkedin.education_fallback'),
            ];
        }

        if (! empty($data['experiences']) && is_array($data['experiences'])) {
            $data['experiences'] = $this->mergeEnrichments($data['experiences']);
            $data['education'] = $data['education'] ?? config('linkedin.education_fallback');

            return $data;
        }

        return null;
    }

    private function writeCacheFile(array $payload): void
    {
        $path = config('linkedin.cache_path');
        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(
            $path,
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    private function cacheFileIsFresh(): bool
    {
        $path = config('linkedin.cache_path');
        if (! is_readable($path)) {
            return false;
        }

        return (time() - filemtime($path)) < $this->cacheTtl();
    }
}
