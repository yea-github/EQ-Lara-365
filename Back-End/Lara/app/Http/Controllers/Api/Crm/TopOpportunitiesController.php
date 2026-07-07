<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmDashboard\GetCrmTopOpportunitiesAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TopOpportunitiesController extends Controller
{
    public function getTopOpportunities(GetCrmTopOpportunitiesAction $getTopOpportunities): JsonResponse
    {
        return response()->json($getTopOpportunities->execute());
    }
}
