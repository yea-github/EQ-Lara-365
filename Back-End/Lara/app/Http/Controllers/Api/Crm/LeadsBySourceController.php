<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmDashboard\GetCrmLeadsBySourceAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class LeadsBySourceController extends Controller
{
    public function getLeadsBySource(GetCrmLeadsBySourceAction $getLeadsBySource): JsonResponse
    {
        return response()->json($getLeadsBySource->execute());
    }
}
