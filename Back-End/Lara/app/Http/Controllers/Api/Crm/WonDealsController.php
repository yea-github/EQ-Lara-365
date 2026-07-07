<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WonDealsController extends Controller
{
    public function getWonDeals(GetCrmSummaryCardAction $getCrmSummaryCard): JsonResponse
    {
        return response()->json($getCrmSummaryCard->execute('won_deals'));
    }
}
