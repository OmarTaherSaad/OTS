<?php
declare(strict_types=1);

namespace App\Domain\Pricing\Policies;

use App\Domain\Pricing\Ports\RoundingPolicyContract;

final class RoundingPolicy implements RoundingPolicyContract
{
    public function __construct(private readonly string $mode = 'nearest_unit') {}

    public function round(float $amount, string $currency): int
    {
        // For now we only support rounding to nearest integer unit across currencies.
        // Extendable for currency-specific rounding rules.
        return (int) round($amount, 0, PHP_ROUND_HALF_UP);
    }
}
