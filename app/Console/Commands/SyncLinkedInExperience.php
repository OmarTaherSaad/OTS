<?php

namespace App\Console\Commands;

use App\Services\LinkedInExperienceService;
use Illuminate\Console\Command;

class SyncLinkedInExperience extends Command
{
    protected $signature = 'linkedin:sync-experience
                            {--force : Refresh even if the cache is still fresh}
                            {--require-live : Fail unless Apify or a LinkedIn export is available}';

    protected $description = 'Fetch work experience from LinkedIn and cache it for the landing page';

    public function handle(LinkedInExperienceService $service): int
    {
        $profileUrl = config('linkedin.profile_url');
        $this->info("Syncing experience from {$profileUrl}");

        if ($service->hasApifyToken()) {
            $token = (string) config('linkedin.apify.token');
            $this->line('Apify token loaded: ' . substr($token, 0, 6) . '…' . substr($token, -4));
            $this->line('Apify actor: ' . config('linkedin.apify.actor'));
        } else {
            $this->warn('APIFY_API_TOKEN is not loaded in config.');
            $this->line('If it is in .env, run: php artisan config:clear');
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

        if (! $service->hasApifyToken() && ! is_readable(config('linkedin.export_path'))) {
            $this->warn('Live LinkedIn fetch unavailable — cache seeded from bundled profile data.');
            $this->line('Add APIFY_API_TOKEN to .env for automatic LinkedIn updates.');
        }

        $this->info('Cached ' . count($experiences) . ' experience entries to ' . config('linkedin.cache_path'));
        $this->info('Education synced: ' . ($service->getEducation()['degree'] ?? 'n/a'));

        return self::SUCCESS;
    }
}
