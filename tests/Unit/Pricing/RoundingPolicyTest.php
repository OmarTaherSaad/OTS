<?php

declare(strict_types=1);

namespace Tests\Unit\Pricing;

use App\Domain\Pricing\Policies\RoundingPolicy;
use PHPUnit\Framework\TestCase;

final class RoundingPolicyTest extends TestCase
{
    public function test_rounds_to_nearest_integer(): void
    {
        $policy = new RoundingPolicy('nearest_unit');
        $this->assertSame(10, $policy->round(9.5, 'USD'));
        $this->assertSame(9, $policy->round(9.4, 'EUR'));
        $this->assertSame(100, $policy->round(100.1, 'EGP'));
    }
}
