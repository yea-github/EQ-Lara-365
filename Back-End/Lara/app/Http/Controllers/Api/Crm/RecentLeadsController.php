<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmDashboard\GetCrmRecentLeadsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class RecentLeadsController extends Controller
{
    public function getRecentLeads(GetCrmRecentLeadsAction $getRecentLeads): JsonResponse
    {
        return response()->json($getRecentLeads->execute());
    }
}
