<?php

namespace App\Http\Controllers\Api\SalesDashboard;

use App\Application\SalesDashboard\GetSalesDashboardSummaryAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesDashboardSummaryController extends Controller
{
    public function getSalesDashboardSummary(Request $request, GetSalesDashboardSummaryAction $action): JsonResponse
    {
        $validated = $request->validate([
            'year' => ['nullable', 'integer', 'between:2020,2026'],
            'month' => ['nullable', 'string', 'in:January,February,March,April,May,June,July,August,September,October,November,December'],
        ]);

        return response()->json($action->execute(
            isset($validated['year']) ? (int) $validated['year'] : null,
            $validated['month'] ?? null
        ));
    }
}
