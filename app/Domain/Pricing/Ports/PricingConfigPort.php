<?php
declare(strict_types=1);

namespace App\Domain\Pricing\Ports;

interface PricingConfigPort
{
    /** @return array{starter: array{usd_egypt:int, usd_non_egypt:int}, pro: array{usd:int}} */
    public function tiers(): array;

    /** @return array{rush_multiplier:float, maintenance_rate:float, free_support_days:int, pages_step_usd:int, pages_threshold:int} */
    public function options(): array;

    /** @return array<string,int> */
    public function features(): array;

    /** @return array<string,int> */
    public function monthly(): array;

    /** @return array{source_url:string, cache_ttl_min:int, base_currency:string, override_usd_egp: mixed, egp_local_discount_percent:float, rounding_mode:string} */
    public function fx(): array;

    /** @return array{enabled:bool,label:string,copy:string,price_usd:int} */
    public function decoy(): array;
}
