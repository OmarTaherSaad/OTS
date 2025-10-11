<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class EstimateControllerTest extends TestCase
{

    private function validPayload(): array
    {
        return [
            'tier' => 'starter',
            'isEgyptBased' => true,
            'pages' => 10,
            'themeLight' => false,
            'themeMedium' => false,
            'themeHeavy' => false,
            'customSections' => false,
            'animations' => false,
            'multicurrency' => false,
            'translation' => false,
            'subscriptions' => false,
            'paymobSetup' => false,
            'paytabsSetup' => false,
            'shippingZones' => false,
            'seo' => false,
            'pixelGa4' => false,
            'perfOpt' => false,
            'accessibility' => false,
            'qaAudit' => false,
            'blogSetup' => false,
            'integrationKlaviyo' => false,
            'integrationMailchimp' => false,
            'whatsappChat' => false,
            'filterSearch' => false,
            'rushDelivery' => false,
            'maintenance' => false,
            'currency' => 'USD',
        ];
    }

    public function test_happy_path(): void
    {
        // Ensure deterministic FX by faking HTTP
        \Illuminate\Support\Facades\Http::fake([
            '*' => \Illuminate\Support\Facades\Http::response(['rates' => ['EUR' => 0.9, 'EGP' => 50.0]], 200)
        ]);
        $response = $this->postJson('/api/estimate', $this->validPayload());
        $response->assertStatus(200)
            ->assertJsonStructure([
                'total' => ['USD','EUR','EGP'],
                'monthly',
                'fx' => ['USD','EUR','EGP'],
                'support_days',
                'currency'
            ]);
    }

    public function test_validation_failures(): void
    {
        $payload = $this->validPayload();
        $payload['tier'] = 'enterprise';
        $response = $this->postJson('/api/estimate', $payload);
        $response->assertStatus(422);
    }

    public function test_fx_failure_returns_503(): void
    {
        \Illuminate\Support\Facades\Http::fake([
            '*' => \Illuminate\Support\Facades\Http::response(null, 500)
        ]);
        $response = $this->postJson('/api/estimate', $this->validPayload());
        $response->assertStatus(503)
            ->assertJson(['message' => 'FX service unavailable']);
    }
}
