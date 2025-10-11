<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Domain\Pricing\Ports\PricingEngineContract;
use App\Domain\Pricing\PricingEngine;
use App\Domain\Pricing\Ports\RoundingPolicyContract;
use App\Domain\Pricing\Policies\RoundingPolicy;
use App\Domain\Pricing\Ports\PricingConfigPort;
use App\Infrastructure\Config\PricingConfig;
use App\Domain\Pricing\Ports\FxRatesPort;
use App\Infrastructure\Fx\FxService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PricingConfigPort::class, PricingConfig::class);
        $this->app->bind(FxRatesPort::class, FxService::class);
        $this->app->bind(RoundingPolicyContract::class, function () {
            $mode = (string) config('pricing.fx.rounding_mode', 'nearest_unit');
            return new RoundingPolicy($mode);
        });
        $this->app->bind(PricingEngineContract::class, PricingEngine::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
