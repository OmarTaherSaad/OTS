<?php

return [
    // MAIL_DRIVER kept as fallback: old .env files only set it, and Laravel 12 ignores it.
    'default' => env('MAIL_MAILER', env('MAIL_DRIVER', 'log')),

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 587),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'scheme' => env('MAIL_SCHEME', env('MAIL_ENCRYPTION') === 'ssl' ? 'smtps' : null),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],
        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],
        'array' => ['transport' => 'array'],
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    'markdown' => [
        'theme' => 'default',
        'paths' => [resource_path('views/vendor/mail')],
    ],
];
