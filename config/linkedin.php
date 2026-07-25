<?php

return [
    'profile_url' => env('LINKEDIN_PROFILE_URL', 'https://www.linkedin.com/in/omartahersaad/'),

    'cache_ttl' => (int) env('LINKEDIN_CACHE_TTL', 86400),

    'cache_path' => storage_path('app/linkedin/experience.json'),

    'seed_path' => resource_path('data/linkedin-profile.json'),

    'export_path' => storage_path('app/linkedin/export/Positions.json'),

    // Optional: path to an extracted LinkedIn data archive folder containing
    // Positions.json and Education.json from linkedin.com/settings/data-privacy
    'export_dir' => env('LINKEDIN_EXPORT_DIR'),

    /*
    | Curated copy keyed by "{company-slug}|{role-slug}" then "{company-slug}".
    | LinkedIn scrapes often omit descriptions; these fill gaps after sync.
    */
    'enrichments' => [
        'foodics|senior-software-engineer' => [
            'role' => 'Senior Software Engineer',
            'company' => 'Foodics',
            'period' => 'Sep 2024 – Present',
            'location' => 'Cairo, Egypt · Hybrid',
            'logo' => 'foodics',
            'highlights' => [
                'Designed and evolved scalable backend systems for a high-traffic, multi-tenant platform serving merchants across the MENA region.',
                'Led the design and execution of a modular monolith architecture, strengthening domain boundaries, testability and long-term maintainability.',
                'Applied Domain-Driven Design (DDD) and Test-Driven Development (TDD) across core domains to reduce regression risk and improve delivery confidence.',
                'Owned backend feature delivery end-to-end across cross-functional teams.',
            ],
            'tags' => ['Laravel', 'DDD', 'TDD', 'Modular Monolith', 'Multi-tenant'],
        ],
        'karat|interview-engineer' => [
            'role' => 'Interview Engineer',
            'company' => 'Karat',
            'period' => 'Sep 2025 – Present',
            'location' => 'Seattle, WA, US · Remote',
            'logo' => 'karat',
            'highlights' => [
                'Lead structured, high-precision technical interviews.',
                'Evaluate algorithms, systems thinking and code quality using calibrated, objective rubrics.',
                'Provide clear, consistent hiring signals helping organizations identify top engineering talent at scale.',
            ],
            'tags' => ['Algorithms', 'Systems Design', 'Code Quality'],
        ],
        'rasmal|back-end-engineer' => [
            'role' => 'Back End Engineer',
            'company' => 'Rasmal',
            'period' => 'Mar 2024 – Aug 2024',
            'location' => 'Riyadh, Saudi Arabia · Remote',
            'logo' => 'rasmal',
            'highlights' => [
                'Built backend services for the Pentugram investment platform — three integrated sub-platforms used by investors and VCs.',
                'Implemented deal flow management features, improving visibility across the investment lifecycle.',
                'Enhanced data import/export pipelines for reliable ingestion and reporting of investment + portfolio data.',
            ],
            'tags' => ['Laravel', 'InvestTech', 'Data Pipelines'],
        ],
        'stryve|back-end-engineer' => [
            'role' => 'Back End Engineer',
            'company' => 'Stryve',
            'period' => 'Jan 2022 – Feb 2024',
            'location' => 'Cairo, Egypt',
            'logo' => 'stryve',
            'highlights' => [
                'Built backend systems for a digital wallet and physical payment card platform supporting B2B payments and collections in Egypt.',
                'Designed and owned services that achieved PCI-DSS compliance and regulatory approvals from the Central Bank of Egypt.',
                'Contributed to infrastructure processing EGP 1B+ in B2B invoices for 1,500+ SMEs and 10+ enterprise suppliers.',
            ],
            'tags' => ['FinTech', 'PCI-DSS', 'Payments', 'Laravel'],
        ],
        'stemless|back-end-engineer' => [
            'role' => 'Back End Engineer',
            'company' => 'Stemless',
            'period' => 'Aug 2021 – Jun 2022',
            'location' => 'Portland, OR, USA · Remote',
            'logo' => 'stemless',
            'highlights' => [
                'Implemented core backend modules — payments, SMS notifications and a loyalty program.',
                'Achieved 90%+ unit-test coverage on developed features, cutting regression risk.',
                'Restructured the database schema, eliminating redundancy and improving query performance and data integrity.',
            ],
            'tags' => ['Laravel', 'PHPUnit', 'Twilio', 'Payments'],
        ],
        'agecs|full-stack-engineer' => [
            'role' => 'Full Stack Engineer',
            'company' => 'AGECS',
            'period' => 'Nov 2019 – Jul 2021',
            'location' => 'Cairo, Egypt',
            'logo' => 'agecs',
            'highlights' => [
                'Built the AGECS-Solutions platform from scratch with Laravel + Vue.js, delivered end-to-end.',
                'Implemented a payment and product registration gateway integrating Fawry and Stripe for secure transactions and onboarding.',
                'Maintained multiple external API integrations and built 4 desktop apps in C# for internal and client operations.',
            ],
            'tags' => ['Laravel', 'Vue.js', 'C#', 'Stripe', 'Fawry'],
        ],
    ],

    'education_fallback' => [
        'degree' => 'B.Sc. in Computer and Systems Engineering — Computer Engineering',
        'university' => 'Faculty of Engineering, Ain Shams University',
        'location' => 'Cairo, Egypt',
        'duration' => '2015 – 2020',
        'project' => 'Graduation Project: Gesture Recognition Using Machine Learning — a deep-learning mouse-replacement system using computer vision. Supervised by Dr. Ashraf Salem and Dr. Khaled Salah (Siemens EDA).',
    ],
];
