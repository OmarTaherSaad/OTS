<?php
declare(strict_types=1);

namespace App\Domain\Pricing\Ports;

use App\Domain\Pricing\DTO\EstimateInput;
use App\Domain\Pricing\DTO\EstimateResult;

interface PricingEngineContract
{
    public function estimate(EstimateInput $input): EstimateResult;
}
