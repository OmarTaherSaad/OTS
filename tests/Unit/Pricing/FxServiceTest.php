<?php

declare(strict_types=1);

namespace Tests\Unit\Pricing;

use App\Infrastructure\Fx\FxService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

final class FxServiceTest extends TestCase
{
    public function test_fetch_and_cache_and_override(): void
    {
        Http::fake([
            '*' => Http::response(['rates' => ['EUR' => 0.9, 'EGP' => 50.0]], 200)
        ]);

        config([
            'pricing.fx.source_url' => 'https://example.com',
            'pricing.fx.cache_ttl_min' => 1,
            'pricing.fx.override_usd_egp' => '48.0',
        ]);

        /** @var \Illuminate\Contracts\Cache\Repository $cache */
        $cache = app('cache.store');
        $service = new FxService($cache);
        $first = $service->getUsdRates();
        $this->assertSame(['USD'=>1.0,'EUR'=>0.9,'EGP'=>48.0], $first);

        // From cache (should preserve override)
        $second = $service->getUsdRates();
        $this->assertSame(48.0, $second['EGP']);
    }
}
