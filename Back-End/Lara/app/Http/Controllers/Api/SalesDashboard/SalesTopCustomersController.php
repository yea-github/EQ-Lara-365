<?php

namespace App\Http\Controllers\Api\SalesDashboard;

use App\Application\SalesDashboard\GetSalesTopCustomersAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SalesTopCustomersController extends Controller
{
    public function getSalesTopCustomers(GetSalesTopCustomersAction $action): JsonResponse
    {
        return response()->json($action->execute());
    }
}
