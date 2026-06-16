<?php

namespace App\Http\Controllers\Api;

use App\Application\Customer\GetCustomersBySalesAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function getCustomerBySales(GetCustomersBySalesAction $getCustomersBySales): JsonResponse
    {
        return response()->json($getCustomersBySales->execute());
    }
}
