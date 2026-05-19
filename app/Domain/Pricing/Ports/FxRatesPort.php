<?php
declare(strict_types=1);

namespace App\Domain\Pricing\Ports;

interface FxRatesPort
{
    /**
     * Returns FX rates indexed by currency code relative to USD base.
     * Example: ['USD'=>1.0,'EUR'=>0.93,'EGP'=>48.0]
     *
     * @return array{USD:float, EUR:float, EGP:float}
     */
    public function getUsdRates(): array;
}
