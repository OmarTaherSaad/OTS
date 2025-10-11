<?php
declare(strict_types=1);

return [
    'tiers' => [
        'starter' => [
            'usd_egypt' => (int) env('PRICING_STARTER_USD_EGYPT', 250),
            'usd_non_egypt' => (int) env('PRICING_STARTER_USD_NON_EGYPT', 400),
        ],
        'pro' => [
            'usd' => (int) env('PRICING_PRO_USD', 900),
        ],
    ],

    'decoy' => [
        'enabled' => filter_var(env('DECOY_ENABLED', true), FILTER_VALIDATE_BOOL),
        'label' => (string) env('DECOY_LABEL', 'Starter+ (not recommended)'),
        'copy' => (string) env('DECOY_COPY', 'Almost Pro price with fewer features. Choose Pro instead.'),
        'price_usd' => (int) env('DECOY_PRICE_USD', 880),
    ],

    'options' => [
        'rush_multiplier' => (float) env('PRICING_RUSH_MULTIPLIER', 1.25),
        'maintenance_rate' => (float) env('PRICING_MAINTENANCE_RATE', 0.05),
        'free_support_days' => (int) env('PRICING_FREE_SUPPORT_DAYS', 10),
        'pages_step_usd' => (int) env('PRICE_PAGES_STEP_USD', 20),
        'pages_threshold' => (int) env('PRICE_PAGES_THRESHOLD', 10),
    ],

    'features' => [
        'theme_light' => (int) env('PRICE_THEME_LIGHT', 120),
        'theme_medium' => (int) env('PRICE_THEME_MEDIUM', 250),
        'theme_heavy' => (int) env('PRICE_THEME_HEAVY', 500),
        'custom_sections' => (int) env('PRICE_CUSTOM_SECTIONS', 150),
        'animations' => (int) env('PRICE_ANIMATIONS', 80),
        'multicurrency' => (int) env('PRICE_MULTICURRENCY', 60),
        'translation' => (int) env('PRICE_TRANSLATION', 120),
        'subscriptions' => (int) env('PRICE_SUBSCRIPTIONS', 150),
        'paymob_setup' => (int) env('PRICE_PAYMOB_SETUP', 70),
        'paytabs_setup' => (int) env('PRICE_PAYTABS_SETUP', 70),
        'shipping_zones' => (int) env('PRICE_SHIPPING_ZONES', 100),
        'seo' => (int) env('PRICE_SEO', 120),
        'pixel_ga4' => (int) env('PRICE_PIXEL_GA4', 60),
        'perf_opt' => (int) env('PRICE_PERF_OPT', 180),
        'accessibility' => (int) env('PRICE_ACCESSIBILITY', 120),
        'qa_audit' => (int) env('PRICE_QA_AUDIT', 90),
        'blog_setup' => (int) env('PRICE_BLOG_SETUP', 60),
        'integration_klaviyo' => (int) env('PRICE_INTEGRATION_KLAVIYO', 50),
        'integration_mailchimp' => (int) env('PRICE_INTEGRATION_MAILCHIMP', 40),
        'whatsapp_chat' => (int) env('PRICE_WHATSAPP_CHAT', 30),
        'filter_search' => (int) env('PRICE_FILTER_SEARCH', 90),
    ],

    'monthly' => [
        'shopify_basic' => (int) env('MONTHLY_SHOPIFY_BASIC', 39),
        'translation_app' => (int) env('MONTHLY_TRANSLATION_APP', 25),
        'subscriptions_app' => (int) env('MONTHLY_SUBSCRIPTIONS_APP', 39),
        'filter_search_app' => (int) env('MONTHLY_FILTER_SEARCH_APP', 19),
        'shipping_app' => (int) env('MONTHLY_SHIPPING_APP', 15),
    ],

    'fx' => [
        'source_url' => (string) env('FX_SOURCE_URL', 'https://openexchangerates.org/api/latest.json'),
        'cache_ttl_min' => (int) env('FX_CACHE_TTL_MIN', 1440),
        'base_currency' => (string) env('FX_BASE_CURRENCY', 'USD'),
        'override_usd_egp' => env('FX_OVERRIDE_USD_EGP'),
        'egp_local_discount_percent' => (float) env('EGP_LOCAL_DISCOUNT_PERCENT', 20),
        'rounding_mode' => (string) env('ROUNDING_MODE', 'nearest_unit'),
    ],
];
