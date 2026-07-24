<?php

return [
    'profile_url' => env('LINKEDIN_PROFILE_URL', 'https://www.linkedin.com/in/omartahersaad/'),

    'cache_ttl' => (int) env('LINKEDIN_CACHE_TTL', 86400),

    'cache_path' => storage_path('app/linkedin/experience.json'),

    'export_path' => storage_path('app/linkedin/export/Positions.json'),

    'apify' => [
        'token' => env('APIFY_API_TOKEN'),
        'actor' => env('LINKEDIN_APIFY_ACTOR', 'calm_builder/linkedin-profile-scraper'),
        'timeout' => (int) env('LINKEDIN_APIFY_TIMEOUT', 120),
    ],

    /*
    | Optional per-company tag overrides keyed by company slug (Str::slug(company)).
    | LinkedIn does not expose skill tags per role, so keep manual tags here if desired.
    */
    'tag_overrides' => [
        'foodics' => ['Laravel', 'DDD', 'TDD', 'Modular Monolith', 'Multi-tenant'],
        'karat' => ['Algorithms', 'Systems Design', 'Code Quality'],
        'rasmal' => ['Laravel', 'InvestTech', 'Data Pipelines'],
        'stryve' => ['FinTech', 'PCI-DSS', 'Payments', 'Laravel'],
        'stemless' => ['Laravel', 'PHPUnit', 'Twilio', 'Payments'],
        'agecs' => ['Laravel', 'Vue.js', 'C#', 'Stripe', 'Fawry'],
    ],
];
