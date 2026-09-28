<?php

namespace Tests\Unit;

use App\Services\RecaptchaVerifier;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RecaptchaVerifierTest extends TestCase
{
    private RecaptchaVerifier $verifier;

    protected function setUp(): void
    {
        parent::setUp();
        $this->verifier = new RecaptchaVerifier();
        config(['app.url' => 'https://omartahersaad.com']);
        config(['contact.recaptcha_min_score' => 0.7]);
        config(['contact.recaptcha_action' => 'contact']);
    }

    public function test_passes_high_score_matching_action_and_host(): void
    {
        Http::fake([
            config('captcha.verification_url') => Http::response([
                'success' => true,
                'score' => 0.9,
                'action' => 'contact',
                'hostname' => 'omartahersaad.com',
            ]),
        ]);

        $this->assertTrue($this->verifier->passes('token', '1.1.1.1'));
    }

    public function test_rejects_low_score(): void
    {
        Http::fake([
            config('captcha.verification_url') => Http::response([
                'success' => true,
                'score' => 0.2,
                'action' => 'contact',
                'hostname' => 'omartahersaad.com',
            ]),
        ]);

        $this->assertFalse($this->verifier->passes('token', '1.1.1.1'));
    }

    public function test_rejects_wrong_action(): void
    {
        Http::fake([
            config('captcha.verification_url') => Http::response([
                'success' => true,
                'score' => 0.9,
                'action' => 'homepage',
                'hostname' => 'omartahersaad.com',
            ]),
        ]);

        $this->assertFalse($this->verifier->passes('token', '1.1.1.1'));
    }
}
