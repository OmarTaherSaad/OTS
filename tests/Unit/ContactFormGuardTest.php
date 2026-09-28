<?php

namespace Tests\Unit;

use App\Services\ContactFormGuard;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class ContactFormGuardTest extends TestCase
{
    private ContactFormGuard $guard;

    protected function setUp(): void
    {
        parent::setUp();
        $this->guard = new ContactFormGuard();
    }

    public function test_honeypot_rejects_filled_company_url(): void
    {
        $this->assertTrue($this->guard->honeypotTripped('https://spam.example'));
        $this->assertFalse($this->guard->honeypotTripped(''));
        $this->assertFalse($this->guard->honeypotTripped(null));
    }

    public function test_issued_at_rejects_instant_and_stale_tokens(): void
    {
        $now = 1_700_000_100;
        $tooFast = Crypt::encryptString((string) ($now - 1));
        $ok = Crypt::encryptString((string) ($now - 10));
        $stale = Crypt::encryptString((string) ($now - 10_000));

        $this->assertFalse($this->guard->issuedAtIsValid($tooFast, $now));
        $this->assertTrue($this->guard->issuedAtIsValid($ok, $now));
        $this->assertFalse($this->guard->issuedAtIsValid($stale, $now));
        $this->assertFalse($this->guard->issuedAtIsValid('not-encrypted', $now));
    }

    public function test_too_many_urls_is_spam(): void
    {
        $this->assertTrue($this->guard->tooManyUrls('hi', 'see http://a.com http://b.com http://c.com'));
        $this->assertFalse($this->guard->tooManyUrls('hi', 'one link http://a.com is fine'));
    }
}
