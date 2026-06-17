<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DailySummeryController;
use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/get-all-employees', [EmployeeController::class, 'getAllEmployees']);
    Route::get('/get-customer-by-sales', [CustomerController::class, 'getCustomerBySales']);
    Route::get('/get-daily-summery', [DailySummeryController::class, 'getDailySummery']);
});
