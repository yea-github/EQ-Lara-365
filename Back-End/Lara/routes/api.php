<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DailySummeryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\HrOverviewController;
use App\Http\Controllers\Api\InventorySummeryController;
use App\Http\Controllers\Api\ProjectOverviewController;
use App\Http\Controllers\Api\RevenueOverviewController;
use App\Http\Controllers\Api\SalesController;
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
Route::get('/pub/get-all-employees', [EmployeeController::class, 'getAllEmployees']);
Route::get('/pub/get-customer-by-sales', [CustomerController::class, 'getCustomerBySales']);
Route::get('/pub/get-daily-summery', [DailySummeryController::class, 'getDailySummery']);
Route::get('/pub/get-hr-overview', [HrOverviewController::class, 'getHrOverview']);
Route::get('/pub/get-inventory-summery', [InventorySummeryController::class, 'getInventorySummery']);
Route::get('/pub/get-project-overview', [ProjectOverviewController::class, 'getProjectOverview']);
Route::get('/pub/get-revenue-overview', [RevenueOverviewController::class, 'getRevenueOverview']);
Route::get('/pub/sales-by-category', [SalesController::class, 'salesByCategory']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/get-all-employees', [EmployeeController::class, 'getAllEmployees']);
    Route::get('/get-customer-by-sales', [CustomerController::class, 'getCustomerBySales']);
    Route::get('/get-daily-summery', [DailySummeryController::class, 'getDailySummery']);
    Route::get('/get-hr-overview', [HrOverviewController::class, 'getHrOverview']);
    Route::get('/get-inventory-summery', [InventorySummeryController::class, 'getInventorySummery']);
    Route::get('/get-project-overview', [ProjectOverviewController::class, 'getProjectOverview']);
    Route::get('/get-revenue-overview', [RevenueOverviewController::class, 'getRevenueOverview']);
    Route::get('/sales-by-category', [SalesController::class, 'salesByCategory']);
});
