<?php
declare(strict_types=1);

namespace App\Domain\Pricing\DTO;

final class EstimateResult
{
    /**
     * @param array{USD:int, EUR:int, EGP:int} $total
     * @param array<string,int> $monthly
     * @param array{USD:float, EUR:float, EGP:float} $fx
     */
    public function __construct(
        public readonly array $total,
        public readonly array $monthly,
        public readonly array $fx,
        public readonly int $supportDays,
    ) {}
}
