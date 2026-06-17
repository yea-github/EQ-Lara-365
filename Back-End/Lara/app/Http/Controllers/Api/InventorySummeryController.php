<?php

namespace App\Http\Controllers\Api;

use App\Application\InventorySummery\GetInventorySummeryAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class InventorySummeryController extends Controller
{
    public function getInventorySummery(GetInventorySummeryAction $getInventorySummery): JsonResponse
    {
        return response()->json($getInventorySummery->execute());
    }
}
