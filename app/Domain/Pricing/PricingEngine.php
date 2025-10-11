<?php
declare(strict_types=1);

namespace App\Domain\Pricing;

use App\Domain\Pricing\DTO\EstimateInput;
use App\Domain\Pricing\DTO\EstimateResult;
use App\Domain\Pricing\Ports\PricingEngineContract;
use App\Domain\Pricing\Ports\FxRatesPort;
use App\Domain\Pricing\Ports\PricingConfigPort;
use App\Domain\Pricing\Ports\RoundingPolicyContract;

final class PricingEngine implements PricingEngineContract
{
    public function __construct(
        private readonly PricingConfigPort $config,
        private readonly FxRatesPort $fx,
        private readonly RoundingPolicyContract $rounding,
    ) {}

    public function estimate(EstimateInput $input): EstimateResult
    {
        $tiers = $this->config->tiers();
        $options = $this->config->options();
        $featuresConfig = $this->config->features();
        $monthlyConfig = $this->config->monthly();
        $fxConfig = $this->config->fx();

        // 1) Base tier
        $subtotalUsd = 0.0;
        if ($input->tier === 'starter') {
            $subtotalUsd += $input->isEgyptBased ? $tiers['starter']['usd_egypt'] : $tiers['starter']['usd_non_egypt'];
        } elseif ($input->tier === 'pro') {
            $subtotalUsd += $tiers['pro']['usd'];
        } else {
            // enterprise not calculable; keep subtotal 0 but likely won't be called for enterprise
            $subtotalUsd += 0.0;
        }

        // 2) Pages threshold math
        if ($input->pages > $options['pages_threshold']) {
            $extraPages = $input->pages - $options['pages_threshold'];
            $subtotalUsd += $extraPages * $options['pages_step_usd'];
        }

        // 3) Sum selected features
        $featureFlags = [
            'theme_light' => $input->themeLight,
            'theme_medium' => $input->themeMedium,
            'theme_heavy' => $input->themeHeavy,
            'custom_sections' => $input->customSections,
            'animations' => $input->animations,
            'multicurrency' => $input->multicurrency,
            'translation' => $input->translation,
            'subscriptions' => $input->subscriptions,
            'paymob_setup' => $input->paymobSetup,
            'paytabs_setup' => $input->paytabsSetup,
            'shipping_zones' => $input->shippingZones,
            'seo' => $input->seo,
            'pixel_ga4' => $input->pixelGa4,
            'perf_opt' => $input->perfOpt,
            'accessibility' => $input->accessibility,
            'qa_audit' => $input->qaAudit,
            'blog_setup' => $input->blogSetup,
            'integration_klaviyo' => $input->integrationKlaviyo,
            'integration_mailchimp' => $input->integrationMailchimp,
            'whatsapp_chat' => $input->whatsappChat,
            'filter_search' => $input->filterSearch,
        ];

        foreach ($featureFlags as $key => $enabled) {
            if ($enabled && array_key_exists($key, $featuresConfig)) {
                $subtotalUsd += $featuresConfig[$key];
            }
        }

        // 4) Rush multiplier
        if ($input->rushDelivery) {
            $subtotalUsd *= $options['rush_multiplier'];
        }

        // 5) Maintenance percent
        if ($input->maintenance) {
            $subtotalUsd += $subtotalUsd * $options['maintenance_rate'];
        }

        // 6) FX conversion
        $rates = $this->fx->getUsdRates(); // ['USD'=>1.0,'EUR'=>x,'EGP'=>y]

        $usd = $subtotalUsd * $rates['USD'];
        $eur = $subtotalUsd * $rates['EUR'];
        $egpRate = $rates['EGP'];

        // Respect FX_OVERRIDE_USD_EGP when provided
        $override = $fxConfig['override_usd_egp'];
        if ($override !== null && $override !== '') {
            $egpRate = (float) $override;
        }
        $egp = $subtotalUsd * $egpRate;

        // Apply EGP local discount percent after conversion/override
        $egpDiscount = $fxConfig['egp_local_discount_percent'];
        if ($egpDiscount > 0) {
            $egp *= (1 - ($egpDiscount / 100.0));
        }

        // 7) Rounding
        $totals = [
            'USD' => $this->rounding->round($usd, 'USD'),
            'EUR' => $this->rounding->round($eur, 'EUR'),
            'EGP' => $this->rounding->round($egp, 'EGP'),
        ];

        // 8) Monthly app costs
        $monthly = [];
        $monthly['shopify_basic'] = $monthlyConfig['shopify_basic'];
        if ($input->translation) {
            $monthly['translation_app'] = $monthlyConfig['translation_app'];
        }
        if ($input->subscriptions) {
            $monthly['subscriptions_app'] = $monthlyConfig['subscriptions_app'];
        }
        if ($input->filterSearch) {
            $monthly['filter_search_app'] = $monthlyConfig['filter_search_app'];
        }
        if ($input->shippingZones) {
            $monthly['shipping_app'] = $monthlyConfig['shipping_app'];
        }

        return new EstimateResult(
            total: $totals,
            monthly: $monthly,
            fx: [
                'USD' => 1.0,
                'EUR' => $rates['EUR'],
                'EGP' => $egpRate,
            ],
            supportDays: $options['free_support_days']
        );
    }
}
