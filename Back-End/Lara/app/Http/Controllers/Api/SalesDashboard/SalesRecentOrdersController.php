<?php

namespace App\Http\Controllers\Api\SalesDashboard;

use App\Application\SalesDashboard\GetSalesRecentOrdersAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SalesRecentOrdersController extends Controller
{
    public function getSalesRecentOrders(GetSalesRecentOrdersAction $action): JsonResponse
    {
        return response()->json($action->execute());
    }
}
