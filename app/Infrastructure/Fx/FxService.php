<?php
declare(strict_types=1);

namespace App\Infrastructure\Fx;

use App\Domain\Pricing\Ports\FxRatesPort;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Support\Facades\Http;
use RuntimeException;

final class FxService implements FxRatesPort
{
    public function __construct(private readonly CacheRepository $cache)
    {
    }

    public function getUsdRates(): array
    {
        $sourceUrl = (string) config('pricing.fx.source_url');
        $ttlMin = (int) config('pricing.fx.cache_ttl_min');
        $cacheKey = 'pricing_fx_rates_usd';

        $rates = $this->cache->get($cacheKey);
        if (!is_array($rates)) {
            $response = Http::timeout(10)->get($sourceUrl);
            if (!$response->successful()) {
                throw new RuntimeException('Failed to fetch FX rates');
            }
            $json = $response->json();
            if (!is_array($json) || !isset($json['rates'])) {
                throw new RuntimeException('Invalid FX response');
            }
            $allRates = $json['rates'];
            $usdToEur = isset($allRates['EUR']) ? (float) $allRates['EUR'] : null;
            $usdToEgp = isset($allRates['EGP']) ? (float) $allRates['EGP'] : null;

            if ($usdToEur === null || $usdToEgp === null) {
                throw new RuntimeException('Missing EUR or EGP rates');
            }

            $rates = [
                'USD' => 1.0,
                'EUR' => $usdToEur,
                'EGP' => $usdToEgp,
            ];

            $this->cache->put($cacheKey, $rates, now()->addMinutes($ttlMin));
        }

        // Respect override for USD->EGP if provided
        $override = config('pricing.fx.override_usd_egp');
        if ($override !== null && $override !== '') {
            $rates['EGP'] = (float) $override;
        }

        if (!isset($rates['USD'], $rates['EUR'], $rates['EGP'])) {
            throw new RuntimeException('Empty or invalid FX rates');
        }

        return $rates;
    }
}
