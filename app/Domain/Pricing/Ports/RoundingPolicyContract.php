<?php
declare(strict_types=1);

namespace App\Domain\Pricing\Ports;

interface RoundingPolicyContract
{
    public function round(float $amount, string $currency): int;
}
