<?php

namespace App\Http\Controllers\Api;

use App\Application\DailySummery\GetDailySummeryAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DailySummeryController extends Controller
{
    public function getDailySummery(GetDailySummeryAction $getDailySummery): JsonResponse
    {
        return response()->json($getDailySummery->execute());
    }
}
