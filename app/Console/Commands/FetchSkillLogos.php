<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FetchSkillLogos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'skills:fetch-logos {--force : Force re-download of existing logos} {--update-existing : Update JSON for existing logos}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and save actual logos for skills that don\'t have them';

    /**
     * Logo sources and mappings
     */
    private $logoMappings = [
        // Backend Development
        'PHP' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg',
            'filename' => 'php.svg'
        ],
        'Laravel' => [
            'url' => 'https://laravel.com/img/logomark.min.svg',
            'filename' => 'laravel.svg'
        ],
        'Livewire' => [
            //'url' => 'https://livewire.laravel.com/img/logo.svg',
            'url' => 'https://cdn.worldvectorlogo.com/logos/livewire-2.svg',
            'filename' => 'livewire.svg'
        ],
        'Python' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg',
            'filename' => 'python.svg'
        ],
        'C#' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg',
            'filename' => 'csharp.svg'
        ],
        'C++' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg',
            'filename' => 'cpp.svg'
        ],
        'MySQL' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg',
            'filename' => 'mysql.svg'
        ],

        // Frontend Development
        'JavaScript' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg',
            'filename' => 'javascript.svg'
        ],
        'Vue.js' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg',
            'filename' => 'vuejs.svg'
        ],
        'HTML5' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg',
            'filename' => 'html5.svg'
        ],
        'CSS3' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg',
            'filename' => 'css3.svg'
        ],
        'Bootstrap' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg',
            'filename' => 'bootstrap.svg'
        ],
        'jQuery' => [
            'url' => 'https://cdn.worldvectorlogo.com/logos/jquery-3.svg',
            'filename' => 'jquery.svg'
        ],

        // Tools & Technologies
        'Git' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg',
            'filename' => 'git.svg'
        ],
        'Docker' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg',
            'filename' => 'docker.svg'
        ],
        'AWS' => [
            'url' => 'https://cdn.worldvectorlogo.com/logos/aws-2.svg',
            'filename' => 'aws.svg'
        ],
        'Linux' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg',
            'filename' => 'linux.svg'
        ],
        'WordPress' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-original.svg',
            'filename' => 'wordpress.svg'
        ],
        'WooCommerce' => [
            'url' => 'https://woocommerce.com/wp-content/themes/woo/images/logo-woocommerce@2x.png',
            'filename' => 'woocommerce.png'
        ],
        'DataDog' => [
            'url' => 'https://cdn.worldvectorlogo.com/logos/datadog-1.svg',
            'filename' => 'datadog.svg'
        ],
        'ArgoCD' => [
            'url' => 'https://argo-cd.readthedocs.io/en/stable/assets/logo.png',
            'filename' => 'argocd.png'
        ],

        // Payment & APIs
        'REST APIs' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apache/apache-original.svg',
            'filename' => 'rest-api.svg'
        ],
        'Webhooks' => [
            'url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/webhooks/webhooks-original.svg',
            'filename' => 'webhooks.svg'
        ],
        'Stripe' => [
            'url' => 'https://js.stripe.com/v3/fingerprinted/img/logo-f9e8a5b0c9c3583cd0bfac515a1b8231d3375be8.png',
            'filename' => 'stripe.png'
        ],
        'PayPal' => [
            'url' => 'https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg',
            'filename' => 'paypal.jpg'
        ]
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🎨 Fetching skill logos...');

        $skillsData = json_decode(Storage::disk('local')->get('skills.json'), true);
        $logosDir = 'assets/images/skill-logos';

        // Create directory if it doesn't exist
        if (!Storage::disk('public')->exists($logosDir)) {
            Storage::disk('public')->makeDirectory($logosDir);
        }

        $downloaded = 0;
        $skipped = 0;
        $failed = 0;
        $updated = 0;

        $skills = collect($skillsData)->mapWithKeys(fn($category) => $category)->toArray();
        foreach ($skills as $skillName => $skillData) {
                if (!isset($this->logoMappings[$skillName])) {
                    $this->warn("⚠️  No logo mapping found for: {$skillName}");
                    continue;
                }

                $mapping = $this->logoMappings[$skillName];
                $filename = $mapping['filename'];
                $filePath = "{$logosDir}/{$filename}";

                // Check if logo already exists and if skill already has logo in JSON
                $hasLogoInJson = isset($skillData['logo']);
                $logoExists = Storage::disk('public')->exists($filePath);

                if ($logoExists && !$this->option('force') && $hasLogoInJson) {
                    $this->line("⏭️  Skipping {$skillName} - logo already exists and is configured");
                    $skipped++;
                    continue;
                }

                // If logo exists but not in JSON, or if we're forcing, update the JSON
                if ($logoExists && (!$hasLogoInJson || $this->option('force'))) {
                    $this->line("📝 Updating {$skillName} - adding logo to skills.json");
                    $this->updateSkillLogo($skillName, $filePath);
                    $updated++;
                    continue;
                }

                try {
                    $this->line("📥 Downloading logo for: {$skillName}");

                    $response = Http::timeout(30)->get($mapping['url']);

                    if ($response->successful()) {
                        Storage::disk('public')->put($filePath, $response->body());

                        // Update skills.json to use the logo instead of icon
                        $this->updateSkillLogo($skillName, $filePath);

                        $this->info("✅ Downloaded: {$skillName} -> {$filename}");
                        $downloaded++;
                    } else {
                        $this->error("❌ Failed to download {$skillName}: HTTP {$response->status()}");
                        $failed++;
                    }
                } catch (\Exception $e) {
                    $this->error("❌ Error downloading {$skillName}: {$e->getMessage()}");
                    $failed++;
                }

                // Small delay to be respectful to servers
                usleep(500000); // 0.5 seconds
        }

        $this->newLine();
        $this->info("📊 Summary:");
        $this->line("   ✅ Downloaded: {$downloaded}");
        $this->line("   📝 Updated JSON: {$updated}");
        $this->line("   ⏭️  Skipped: {$skipped}");
        $this->line("   ❌ Failed: {$failed}");

        // Handle --update-existing option
        if ($this->option('update-existing')) {
            $this->newLine();
            $this->info("🔄 Updating JSON for existing logos...");
            $updated += $this->updateExistingLogos($skillsData, $logosDir);
        }

        if ($downloaded > 0 || $updated > 0) {
            $this->newLine();
            $this->info("🎉 Don't forget to run: npm run development");
        }

        return 0;
    }

    /**
     * Update the skills.json file to use logo instead of icon
     */
    private function updateSkillLogo(string $skillName, string $filePath)
    {
        $skillsData = json_decode(Storage::disk('local')->get('skills.json'), true);

        foreach ($skillsData as $category => &$skills) {
            if (isset($skills[$skillName])) {
                // Remove icon and add logo
                unset($skills[$skillName]['icon']);
                $skills[$skillName]['logo'] = $filePath;
                break;
            }
        }

        Storage::disk('local')->put('skills.json', json_encode($skillsData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * Update JSON for existing logos that don't have logo entries
     */
    private function updateExistingLogos(array $skillsData, string $logosDir): int
    {
        $updated = 0;
        $skillsData = json_decode(Storage::disk('local')->get('skills.json'), true);
        $needsUpdate = false;

        foreach ($skillsData as $category => &$skills) {
            foreach ($skills as $skillName => &$skillData) {
                // Skip if already has logo
                if (isset($skillData['logo'])) {
                    continue;
                }

                // Check if we have a mapping for this skill
                if (!isset($this->logoMappings[$skillName])) {
                    continue;
                }

                $mapping = $this->logoMappings[$skillName];
                $filename = $mapping['filename'];
                $filePath = "{$logosDir}/{$filename}";

                // Check if logo file exists
                if (Storage::disk('public')->exists($filePath)) {
                    $this->line("📝 Adding logo to JSON for: {$skillName}");

                    // Remove icon if it exists
                    if (isset($skillData['icon'])) {
                        unset($skillData['icon']);
                    }

                    // Add logo
                    $skillData['logo'] = $filePath;
                    $needsUpdate = true;
                    $updated++;
                }
            }
        }

        // Save the updated JSON if changes were made
        if ($needsUpdate) {
            Storage::disk('local')->put('skills.json', json_encode($skillsData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        return $updated;
    }
}
