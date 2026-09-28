<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RecaptchaVerifier
{
    public function passes(?string $token, ?string $ip): bool
    {
        if (! filled($token)) {
            return false;
        }

        $response = Http::asForm()->post(config('captcha.verification_url'), [
            'secret' => config('captcha.secret_key'),
            'response' => $token,
            'remoteip' => $ip,
        ]);

        if (! $response->json('success')) {
            return false;
        }

        $score = $response->json('score');
        if (is_numeric($score) && (float) $score < config('contact.recaptcha_min_score')) {
            return false;
        }

        $action = $response->json('action');
        if (is_string($action) && $action !== '' && $action !== config('contact.recaptcha_action')) {
            return false;
        }

        $hostname = $response->json('hostname');
        $expected = parse_url((string) config('app.url'), PHP_URL_HOST);
        if (is_string($hostname) && $hostname !== '' && is_string($expected) && $expected !== '') {
            $allowed = [$expected, 'www.'.$expected, preg_replace('/^www\./', '', $expected)];
            if (! in_array($hostname, array_filter($allowed), true)) {
                return false;
            }
        }

        return true;
    }
}
