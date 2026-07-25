<?php

namespace App\Console\Commands;

use App\Services\LinkedInExperienceService;
use Illuminate\Console\Command;

class SyncLinkedInExperience extends Command
{
    protected $signature = 'linkedin:sync-experience
                            {--force : Refresh even if the cache is still fresh}
                            {--require-live : Fail unless a LinkedIn data export is available}';

    protected $description = 'Load work experience from a LinkedIn data export (or bundled seed) for the landing page';

    public function handle(LinkedInExperienceService $service): int
    {
        $profileUrl = config('linkedin.profile_url');
        $this->info("Syncing experience for {$profileUrl}");

        if ($service->hasLinkedInExport()) {
            $paths = array_filter([
                config('linkedin.export_dir'),
                config('linkedin.export_path'),
            ]);
            $this->line('LinkedIn export found: ' . implode(', ', $paths));
        } else {
            $this->warn('No LinkedIn export found — will use bundled profile data if needed.');
            $this->line('To refresh from LinkedIn: Settings → Data Privacy → Get a copy of your data.');
            $this->line('Place Positions.json at ' . config('linkedin.export_path')
                . ' or set LINKEDIN_EXPORT_DIR to the extracted archive folder.');
        }

        try {
            $experiences = $service->sync(
                $this->option('force'),
                $this->option('require-live')
            );
        } catch (\RuntimeException $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        }

        if ($error = $service->getLastSyncError()) {
            $this->warn('LinkedIn export unavailable — cache seeded from bundled profile data.');
            $this->line($error);
        }

        $this->info('Cached ' . count($experiences) . ' experience entries to ' . config('linkedin.cache_path'));
        $this->info('Education synced: ' . ($service->getEducation()['degree'] ?? 'n/a'));

        return self::SUCCESS;
    }
}
