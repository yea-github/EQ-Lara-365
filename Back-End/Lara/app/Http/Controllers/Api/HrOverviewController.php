<?php

namespace App\Http\Controllers\Api;

use App\Application\HrOverview\GetHrOverviewAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class HrOverviewController extends Controller
{
    public function getHrOverview(GetHrOverviewAction $getHrOverview): JsonResponse
    {
        return response()->json($getHrOverview->execute());
    }
}
