<?php

namespace App\Http\Controllers\Api;

use App\Application\ProjectOverview\GetProjectOverviewAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProjectOverviewController extends Controller
{
    public function getProjectOverview(GetProjectOverviewAction $getProjectOverview): JsonResponse
    {
        return response()->json($getProjectOverview->execute());
    }
}
