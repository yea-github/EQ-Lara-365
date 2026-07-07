<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class QualifiedLeadsController extends Controller
{
    public function getQualifiedLeads(GetCrmSummaryCardAction $getCrmSummaryCard): JsonResponse
    {
        return response()->json($getCrmSummaryCard->execute('qualified_leads'));
    }
}
