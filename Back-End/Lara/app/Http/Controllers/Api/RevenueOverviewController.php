<?php

namespace App\Http\Controllers\Api;

use App\Application\RevenueOverview\GetRevenueOverviewAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class RevenueOverviewController extends Controller
{
    public function getRevenueOverview(GetRevenueOverviewAction $getRevenueOverview): JsonResponse
    {
        return response()->json($getRevenueOverview->execute());
    }
}
