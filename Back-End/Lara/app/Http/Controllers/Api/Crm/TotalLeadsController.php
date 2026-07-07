<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TotalLeadsController extends Controller
{
    public function getTotalLeads(GetCrmSummaryCardAction $getCrmSummaryCard): JsonResponse
    {
        return response()->json($getCrmSummaryCard->execute('total_leads'));
    }
}
