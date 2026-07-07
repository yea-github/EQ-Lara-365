<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class OpportunitiesController extends Controller
{
    public function getOpportunities(GetCrmSummaryCardAction $getCrmSummaryCard): JsonResponse
    {
        return response()->json($getCrmSummaryCard->execute('opportunities'));
    }
}
