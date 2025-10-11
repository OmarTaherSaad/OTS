<?php
declare(strict_types=1);

namespace App\Application\Estimate;

use App\Domain\Pricing\DTO\EstimateInput as DomainEstimateInput;
use App\Domain\Pricing\DTO\EstimateResult;
use App\Domain\Pricing\Ports\PricingEngineContract;

final class EstimateUseCase
{
    public function __construct(private readonly PricingEngineContract $engine) {}

    /**
     * @param array<string,mixed> $payload
     */
    public function handle(array $payload): EstimateResult
    {
        $input = new DomainEstimateInput(
            tier: (string) $payload['tier'],
            isEgyptBased: (bool) $payload['isEgyptBased'],
            pages: (int) $payload['pages'],
            themeLight: (bool) $payload['themeLight'],
            themeMedium: (bool) $payload['themeMedium'],
            themeHeavy: (bool) $payload['themeHeavy'],
            customSections: (bool) $payload['customSections'],
            animations: (bool) $payload['animations'],
            multicurrency: (bool) $payload['multicurrency'],
            translation: (bool) $payload['translation'],
            subscriptions: (bool) $payload['subscriptions'],
            paymobSetup: (bool) $payload['paymobSetup'],
            paytabsSetup: (bool) $payload['paytabsSetup'],
            shippingZones: (bool) $payload['shippingZones'],
            seo: (bool) $payload['seo'],
            pixelGa4: (bool) $payload['pixelGa4'],
            perfOpt: (bool) $payload['perfOpt'],
            accessibility: (bool) $payload['accessibility'],
            qaAudit: (bool) $payload['qaAudit'],
            blogSetup: (bool) $payload['blogSetup'],
            integrationKlaviyo: (bool) $payload['integrationKlaviyo'],
            integrationMailchimp: (bool) $payload['integrationMailchimp'],
            whatsappChat: (bool) $payload['whatsappChat'],
            filterSearch: (bool) $payload['filterSearch'],
            rushDelivery: (bool) $payload['rushDelivery'],
            maintenance: (bool) $payload['maintenance'],
            currency: (string) $payload['currency'],
        );

        return $this->engine->estimate($input);
    }
}
