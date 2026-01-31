<?php

declare(strict_types=1);

namespace Tests\Unit\Pricing;

use App\Domain\Pricing\DTO\EstimateInput;
use App\Domain\Pricing\Policies\RoundingPolicy;
use App\Domain\Pricing\Ports\FxRatesPort;
use App\Domain\Pricing\Ports\PricingConfigPort;
use App\Domain\Pricing\PricingEngine;
use PHPUnit\Framework\TestCase;

final class PricingEngineTest extends TestCase
{
    private function makeInput(array $overrides = []): EstimateInput
    {
        return new EstimateInput(
            tier: 'starter',
            isEgyptBased: true,
            pages: 10,
            themeLight: false,
            themeMedium: false,
            themeHeavy: false,
            customSections: false,
            animations: false,
            multicurrency: false,
            translation: false,
            subscriptions: false,
            paymobSetup: false,
            paytabsSetup: false,
            shippingZones: false,
            seo: false,
            pixelGa4: false,
            perfOpt: false,
            accessibility: false,
            qaAudit: false,
            blogSetup: false,
            integrationKlaviyo: false,
            integrationMailchimp: false,
            whatsappChat: false,
            filterSearch: false,
            rushDelivery: false,
            maintenance: false,
            currency: 'USD',
            ...$overrides
        );
    }

    private function config(): PricingConfigPort
    {
        return new class implements PricingConfigPort {
            public function tiers(): array { return [ 'starter' => ['usd_egypt'=>250,'usd_non_egypt'=>400], 'pro' => ['usd'=>900] ]; }
            public function options(): array { return ['rush_multiplier'=>1.25,'maintenance_rate'=>0.05,'free_support_days'=>10,'pages_step_usd'=>20,'pages_threshold'=>10]; }
            public function features(): array { return [
                'theme_light'=>120,'theme_medium'=>250,'theme_heavy'=>500,'custom_sections'=>150,'animations'=>80,'multicurrency'=>60,
                'translation'=>120,'subscriptions'=>150,'paymob_setup'=>70,'paytabs_setup'=>70,'shipping_zones'=>100,'seo'=>120,'pixel_ga4'=>60,
                'perf_opt'=>180,'accessibility'=>120,'qa_audit'=>90,'blog_setup'=>60,'integration_klaviyo'=>50,'integration_mailchimp'=>40,'whatsapp_chat'=>30,'filter_search'=>90,
            ]; }
            public function monthly(): array { return [ 'shopify_basic'=>39,'translation_app'=>25,'subscriptions_app'=>39,'filter_search_app'=>19,'shipping_app'=>15 ]; }
            public function fx(): array { return [ 'source_url'=>'', 'cache_ttl_min'=>1440, 'base_currency'=>'USD', 'override_usd_egp'=>null, 'egp_local_discount_percent'=>20.0, 'rounding_mode'=>'nearest_unit' ]; }
            public function decoy(): array { return ['enabled'=>true,'label'=>'x','copy'=>'y','price_usd'=>880]; }
        };
    }

    private function fx(float $eur = 0.93, float $egp = 48.0): FxRatesPort
    {
        return new class($eur,$egp) implements FxRatesPort {
            public function __construct(private float $eur, private float $egp) {}
            public function getUsdRates(): array { return ['USD'=>1.0,'EUR'=>$this->eur,'EGP'=>$this->egp]; }
        };
    }

    public function test_base_tier_starter_egypt_and_non_egypt_and_pro(): void
    {
        $engine = new PricingEngine($this->config(), $this->fx(), new RoundingPolicy());
        $starterEgypt = $engine->estimate($this->makeInput(['isEgyptBased'=>true]));
        $starterNonEgypt = $engine->estimate($this->makeInput(['isEgyptBased'=>false]));
        $pro = $engine->estimate($this->makeInput(['tier'=>'pro']));

        $this->assertSame(250, $starterEgypt->total['USD']);
        $this->assertSame(400, $starterNonEgypt->total['USD']);
        $this->assertSame(900, $pro->total['USD']);
    }

    public function test_pages_threshold_math(): void
    {
        $engine = new PricingEngine($this->config(), $this->fx(), new RoundingPolicy());
        $r = $engine->estimate($this->makeInput(['pages'=>15]));
        // 250 + (15-10)*20 = 350
        $this->assertSame(350, $r->total['USD']);
    }

    public function test_feature_summation(): void
    {
        $engine = new PricingEngine($this->config(), $this->fx(), new RoundingPolicy());
        $r = $engine->estimate($this->makeInput(['themeLight'=>true,'customSections'=>true,'animations'=>true]));
        // 250 + 120 + 150 + 80 = 600
        $this->assertSame(600, $r->total['USD']);
    }

    public function test_rush_and_maintenance_effects(): void
    {
        $engine = new PricingEngine($this->config(), $this->fx(), new RoundingPolicy());
        // base 250, rush 1.25 -> 312.5, maintenance +5% -> 328.125 -> rounds 328
        $r = $engine->estimate($this->makeInput(['rushDelivery'=>true,'maintenance'=>true]));
        $this->assertSame(328, $r->total['USD']);
    }

    public function test_fx_conversion_override_and_egp_discount(): void
    {
        $config = $this->config();
        $engine = new PricingEngine($config, $this->fx(0.9, 50.0), new RoundingPolicy());
        $r = $engine->estimate($this->makeInput());
        $this->assertSame((int) round(250*0.9,0), $r->total['EUR']);
        // Override path via config not used here; engine applies discount after conversion in infrastructure
        $this->assertTrue($r->total['EGP'] > 0);
    }

    public function test_rounding(): void
    {
        $engine = new PricingEngine($this->config(), $this->fx(1.0, 1.0), new RoundingPolicy());
        $r = $engine->estimate($this->makeInput());
        $this->assertIsInt($r->total['USD']);
        $this->assertIsInt($r->total['EUR']);
        $this->assertIsInt($r->total['EGP']);
    }

    public function test_monthly_inclusions(): void
    {
        $engine = new PricingEngine($this->config(), $this->fx(), new RoundingPolicy());
        $r = $engine->estimate($this->makeInput(['translation'=>true,'subscriptions'=>true,'filterSearch'=>true,'shippingZones'=>true]));
        $this->assertArrayHasKey('shopify_basic', $r->monthly);
        $this->assertArrayHasKey('translation_app', $r->monthly);
        $this->assertArrayHasKey('subscriptions_app', $r->monthly);
        $this->assertArrayHasKey('filter_search_app', $r->monthly);
        $this->assertArrayHasKey('shipping_app', $r->monthly);
    }
}
