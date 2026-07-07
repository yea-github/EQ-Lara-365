<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmDashboard\GetCrmPipelineOverviewAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PipelineOverviewController extends Controller
{
    public function getPipelineOverview(GetCrmPipelineOverviewAction $getPipelineOverview): JsonResponse
    {
        return response()->json($getPipelineOverview->execute());
    }
}
