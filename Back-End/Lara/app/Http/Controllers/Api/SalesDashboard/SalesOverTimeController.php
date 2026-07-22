<?php

namespace App\Http\Controllers\Api\SalesDashboard;

use App\Application\SalesDashboard\GetSalesOverTimeAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SalesOverTimeController extends Controller
{
    public function getSalesOverTime(GetSalesOverTimeAction $action): JsonResponse
    {
        return response()->json($action->execute());
    }
}
