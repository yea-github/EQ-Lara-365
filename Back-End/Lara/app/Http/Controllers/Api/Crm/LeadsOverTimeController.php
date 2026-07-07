<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmDashboard\GetCrmLeadsOverTimeAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class LeadsOverTimeController extends Controller
{
    public function getLeadsOverTime(GetCrmLeadsOverTimeAction $getLeadsOverTime): JsonResponse
    {
        return response()->json($getLeadsOverTime->execute());
    }
}
