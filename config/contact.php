<?php

return [
    'admin_email' => env('CONTACT_ADMIN_EMAIL', 'ots.for.work@gmail.com'),
    'from_address' => env('MAIL_FROM_ADDRESS', 'no-reply@omartahersaad.com'),
    'recaptcha_min_score' => (float) env('RECAPTCHA_MIN_SCORE', 0.7),
    'recaptcha_action' => 'contact',
    'min_fill_seconds' => (int) env('CONTACT_MIN_FILL_SECONDS', 3),
    'max_fill_seconds' => (int) env('CONTACT_MAX_FILL_SECONDS', 3600),
    'max_urls' => (int) env('CONTACT_MAX_URLS', 2),
];
