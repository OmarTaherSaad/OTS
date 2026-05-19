<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Application\Estimate\EstimateUseCase;
use App\Http\Requests\EstimateRequest;
use Illuminate\Http\JsonResponse;
use RuntimeException;

class EstimateController extends Controller
{
    public function __construct(private readonly EstimateUseCase $useCase) {}

    public function __invoke(EstimateRequest $request): JsonResponse
    {
        try {
            $result = $this->useCase->handle($request->validated());
        } catch (RuntimeException $e) {
            return response()->json(['message' => 'FX service unavailable'], 503);
        }

        return response()->json([
            'total' => $result->total,
            'monthly' => $result->monthly,
            'fx' => $result->fx,
            'support_days' => $result->supportDays,
            'currency' => (string) $request->input('currency'),
        ]);
    }
}
