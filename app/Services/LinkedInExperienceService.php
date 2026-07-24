<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LinkedInExperienceService
{
    public function getExperiences(bool $allowStale = true): array
    {
        $cached = Cache::get($this->cacheKey());
        if (is_array($cached) && ! empty($cached)) {
            return $this->attachLogoUrls($cached);
        }

        $fromFile = $this->readCacheFile();
        if ($fromFile !== null) {
            if ($this->cacheFileIsFresh()) {
                Cache::put($this->cacheKey(), $fromFile, $this->cacheTtl());

                return $this->attachLogoUrls($fromFile);
            }

            if ($allowStale) {
                Log::info('Using stale LinkedIn experience cache; run linkedin:sync-experience to refresh.');

                return $this->attachLogoUrls($fromFile);
            }
        }

        return [];
    }

    public function sync(bool $force = false): array
    {
        if (! $force && $this->cacheFileIsFresh()) {
            $existing = $this->readCacheFile();
            if ($existing !== null) {
                Cache::put($this->cacheKey(), $existing, $this->cacheTtl());

                return $existing;
            }
        }

        $experiences = $this->fetchFromApify()
            ?? $this->fetchFromLinkedInExport();

        if ($experiences === null || empty($experiences)) {
            throw new \RuntimeException(
                'Could not fetch LinkedIn experience. Set APIFY_API_TOKEN or place a Positions.json export at '
                . config('linkedin.export_path')
            );
        }

        $this->writeCacheFile($experiences);
        Cache::put($this->cacheKey(), $experiences, $this->cacheTtl());

        return $experiences;
    }

    private function fetchFromApify(): ?array
    {
        $token = config('linkedin.apify.token');
        if (empty($token)) {
            return null;
        }

        $profileUrl = config('linkedin.profile_url');
        $actor = str_replace('/', '~', config('linkedin.apify.actor'));
        $timeout = config('linkedin.apify.timeout');

        $response = Http::timeout($timeout)
            ->post(
                "https://api.apify.com/v2/acts/{$actor}/run-sync-get-dataset-items?token={$token}",
                ['profiles' => [$profileUrl]]
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
        $rawExperience = $profile['experience'] ?? $profile['experiences'] ?? [];

        if (empty($rawExperience) && isset($profile['experienceData']['experiences'])) {
            $rawExperience = $profile['experienceData']['experiences'];
        }

        return $this->normalizeApifyExperiences($rawExperience);
    }

    private function fetchFromLinkedInExport(): ?array
    {
        $path = config('linkedin.export_path');
        if (! is_readable($path)) {
            return null;
        }

        $payload = json_decode(file_get_contents($path), true);
        if (! is_array($payload)) {
            return null;
        }

        $rows = array_is_list($payload) ? $payload : ($payload['elements'] ?? [$payload]);

        return $this->normalizeLinkedInExport($rows);
    }

    private function normalizeApifyExperiences(array $rows): array
    {
        $experiences = [];

        foreach ($rows as $row) {
            if (! is_array($row)) {
                continue;
            }

            $company = trim((string) ($row['company'] ?? $row['companyName'] ?? ''));
            $role = trim((string) ($row['title'] ?? $row['jobTitle'] ?? ''));

            if ($company === '' && $role === '') {
                continue;
            }

            $slug = Str::slug($company);
            $period = $this->formatPeriod(
                $row['dateRange'] ?? null,
                $row['startDate'] ?? $row['start_date'] ?? $row['jobStartedOn'] ?? null,
                $row['endDate'] ?? $row['end_date'] ?? $row['jobEndedOn'] ?? null,
                (bool) ($row['jobStillWorking'] ?? false)
            );

            $experiences[] = [
                'role' => $role,
                'company' => $company,
                'period' => $period,
                'location' => trim((string) ($row['location'] ?? $row['jobLocation'] ?? '')),
                'logo' => $slug,
                'logo_url' => $row['logoUrl'] ?? $row['companyLogo'] ?? null,
                'highlights' => $this->descriptionToHighlights(
                    $row['description'] ?? $row['jobDescription'] ?? ''
                ),
                'tags' => config("linkedin.tag_overrides.{$slug}", []),
            ];
        }

        return $experiences;
    }

    private function normalizeLinkedInExport(array $rows): array
    {
        $experiences = [];

        foreach ($rows as $row) {
            if (! is_array($row)) {
                continue;
            }

            $company = trim((string) ($row['Company Name'] ?? $row['companyName'] ?? $row['company'] ?? ''));
            $role = trim((string) ($row['Title'] ?? $row['title'] ?? ''));
            if ($company === '' && $role === '') {
                continue;
            }

            $slug = Str::slug($company);
            $period = $this->formatPeriod(
                null,
                $row['Started On'] ?? $row['startedOn'] ?? null,
                $row['Finished On'] ?? $row['finishedOn'] ?? null
            );

            $experiences[] = [
                'role' => $role,
                'company' => $company,
                'period' => $period,
                'location' => trim((string) ($row['Location'] ?? $row['location'] ?? '')),
                'logo' => $slug,
                'logo_url' => null,
                'highlights' => $this->descriptionToHighlights($row['Description'] ?? $row['description'] ?? ''),
                'tags' => config("linkedin.tag_overrides.{$slug}", []),
            ];
        }

        return $experiences;
    }

    private function formatPeriod(?string $dateRange, mixed $start, mixed $end, bool $stillWorking = false): string
    {
        if (is_string($dateRange) && trim($dateRange) !== '') {
            return str_replace([' - ', ' – '], ' – ', trim($dateRange));
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
            return true;
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
        $description = trim($description);
        if ($description === '') {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', $description) ?: [];
        $highlights = [];

        foreach ($lines as $line) {
            $line = trim($line);
            $line = preg_replace('/^[\-\*\u2022\u2023\u25E6\u2043\u2219]\s*/u', '', $line);
            if ($line !== '') {
                $highlights[] = $line;
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
        return 'linkedin.experience.' . md5((string) config('linkedin.profile_url'));
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

        return is_array($data) ? $data : null;
    }

    private function writeCacheFile(array $experiences): void
    {
        $path = config('linkedin.cache_path');
        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(
            $path,
            json_encode($experiences, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
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
