<?php

namespace App\Http\Controllers\Api;

use App\Application\Sales\GetSalesByCategoryAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SalesController extends Controller
{
    public function salesByCategory(GetSalesByCategoryAction $getSalesByCategory): JsonResponse
    {
        return response()->json($getSalesByCategory->execute());
    }
}
