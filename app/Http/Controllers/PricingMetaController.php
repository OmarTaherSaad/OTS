<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

final class PricingMetaController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'decoy' => config('pricing.decoy'),
            'support_days' => (int) config('pricing.options.free_support_days'),
        ]);
    }
}
