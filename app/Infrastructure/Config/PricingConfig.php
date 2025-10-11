<?php
declare(strict_types=1);

namespace App\Infrastructure\Config;

use App\Domain\Pricing\Ports\PricingConfigPort;

final class PricingConfig implements PricingConfigPort
{
    public function tiers(): array
    {
        /** @var array $tiers */
        $tiers = config('pricing.tiers', []);
        return $tiers;
    }

    public function options(): array
    {
        /** @var array $options */
        $options = config('pricing.options', []);
        return $options;
    }

    public function features(): array
    {
        /** @var array $features */
        $features = config('pricing.features', []);
        return $features;
    }

    public function monthly(): array
    {
        /** @var array $monthly */
        $monthly = config('pricing.monthly', []);
        return $monthly;
    }

    public function fx(): array
    {
        /** @var array $fx */
        $fx = config('pricing.fx', []);
        return $fx;
    }

    public function decoy(): array
    {
        /** @var array $decoy */
        $decoy = config('pricing.decoy', []);
        return $decoy;
    }
}
