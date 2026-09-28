<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Throwable;

class ContactFormGuard
{
    public function honeypotTripped(?string $companyUrl): bool
    {
        return filled($companyUrl);
    }

    public function issuedAtIsValid(?string $encrypted, int $now): bool
    {
        if (! is_string($encrypted) || $encrypted === '') {
            return false;
        }

        try {
            $issuedAt = (int) Crypt::decryptString($encrypted);
        } catch (Throwable) {
            return false;
        }

        $age = $now - $issuedAt;

        return $age >= config('contact.min_fill_seconds')
            && $age <= config('contact.max_fill_seconds');
    }

    public function tooManyUrls(string $subject, string $message): bool
    {
        $text = $subject."\n".$message;
        preg_match_all('#https?://#i', $text, $matches);

        return count($matches[0]) > config('contact.max_urls');
    }
}
