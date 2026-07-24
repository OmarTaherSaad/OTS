<?php

namespace App\Console\Commands;

use App\Services\LinkedInExperienceService;
use Illuminate\Console\Command;

class SyncLinkedInExperience extends Command
{
    protected $signature = 'linkedin:sync-experience {--force : Refresh even if the cache is still fresh}';

    protected $description = 'Fetch work experience from LinkedIn and cache it for the landing page';

    public function handle(LinkedInExperienceService $service): int
    {
        $profileUrl = config('linkedin.profile_url');
        $this->info("Syncing experience from {$profileUrl}");

        try {
            $experiences = $service->sync($this->option('force'));
        } catch (\RuntimeException $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        }

        $this->info('Cached ' . count($experiences) . ' experience entries to ' . config('linkedin.cache_path'));

        return self::SUCCESS;
    }
}
