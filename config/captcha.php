<?php

return [
    'site_key'   => env('RECAPTCHA_SITE_KEY'),
    'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    'test' => [
        'site_key'   => "10000000-ffff-ffff-ffff-000000000001",
        'secret_key' => "0x0000000000000000000000000000000000000000",
    ]
];