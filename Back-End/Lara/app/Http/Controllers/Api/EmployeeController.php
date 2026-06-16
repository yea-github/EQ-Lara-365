<?php

namespace App\Http\Controllers\Api;

use App\Application\Employee\GetAllEmployeesAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function getAllEmployees(GetAllEmployeesAction $getAllEmployees): JsonResponse
    {
        return response()->json($getAllEmployees->execute());
    }
}
