<?php
declare(strict_types=1);

namespace App\Domain\Pricing\DTO;

final class EstimateInput
{
    public function __construct(
        public readonly string $tier,
        public readonly bool $isEgyptBased,
        public readonly int $pages,
        public readonly bool $themeLight,
        public readonly bool $themeMedium,
        public readonly bool $themeHeavy,
        public readonly bool $customSections,
        public readonly bool $animations,
        public readonly bool $multicurrency,
        public readonly bool $translation,
        public readonly bool $subscriptions,
        public readonly bool $paymobSetup,
        public readonly bool $paytabsSetup,
        public readonly bool $shippingZones,
        public readonly bool $seo,
        public readonly bool $pixelGa4,
        public readonly bool $perfOpt,
        public readonly bool $accessibility,
        public readonly bool $qaAudit,
        public readonly bool $blogSetup,
        public readonly bool $integrationKlaviyo,
        public readonly bool $integrationMailchimp,
        public readonly bool $whatsappChat,
        public readonly bool $filterSearch,
        public readonly bool $rushDelivery,
        public readonly bool $maintenance,
        public readonly string $currency,
    ) {}
}
