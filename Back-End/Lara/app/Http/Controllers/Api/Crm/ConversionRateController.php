<?php

namespace App\Http\Controllers\Api\Crm;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ConversionRateController extends Controller
{
    public function getConversionRate(GetCrmSummaryCardAction $getCrmSummaryCard): JsonResponse
    {
        return response()->json($getCrmSummaryCard->execute('conversion_rate'));
    }
}
