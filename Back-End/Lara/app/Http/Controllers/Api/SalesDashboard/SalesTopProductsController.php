<?php

namespace App\Http\Controllers\Api\SalesDashboard;

use App\Application\SalesDashboard\GetSalesTopProductsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SalesTopProductsController extends Controller
{
    public function getSalesTopProducts(GetSalesTopProductsAction $action): JsonResponse
    {
        return response()->json($action->execute());
    }
}
