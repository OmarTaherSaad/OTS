<?php

namespace Tests\Feature;

use App\Mail\ContactForAdminMail;
use App\Mail\ContactMail;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactSubmitTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(ThrottleRequests::class);
        Mail::fake();
        Http::fake([
            config('captcha.verification_url') => Http::response([
                'success' => true,
                'score' => 0.9,
                'action' => 'contact',
                'hostname' => parse_url((string) config('app.url'), PHP_URL_HOST) ?: 'localhost',
            ]),
        ]);
    }

    public function test_valid_submission_mails_admin_only(): void
    {
        $this->from('/')->post(route('contact-submit'), $this->validPayload())
            ->assertRedirect('/')
            ->assertSessionHas('success');

        Mail::assertQueued(ContactForAdminMail::class, function (ContactForAdminMail $mail) {
            return $mail->hasTo(config('contact.admin_email'));
        });
        Mail::assertNotQueued(ContactMail::class);
    }

    public function test_honeypot_looks_successful_but_sends_no_mail(): void
    {
        $payload = $this->validPayload();
        $payload['company_url'] = 'https://bot.example';

        $this->from('/')->post(route('contact-submit'), $payload)
            ->assertRedirect('/')
            ->assertSessionHas('success');

        Mail::assertNothingOutgoing();
    }

    public function test_too_many_urls_are_rejected(): void
    {
        $payload = $this->validPayload();
        $payload['message'] = 'spam http://a.com http://b.com http://c.com more text here';

        $this->from('/')->post(route('contact-submit'), $payload)
            ->assertRedirect('/')
            ->assertSessionHasErrors('message');

        Mail::assertNothingOutgoing();
    }

    /**
     * @return array<string, string>
     */
    private function validPayload(): array
    {
        return [
            'name' => 'Jane Doe',
            'phone' => '201000000000',
            'email' => 'jane@example.com',
            'subject' => 'Need a Laravel backend',
            'message' => 'We are building a payments platform and need help.',
            'g-recaptcha-response' => 'test-token',
            'form_ts' => Crypt::encryptString((string) (time() - 10)),
            'company_url' => '',
        ];
    }
}
