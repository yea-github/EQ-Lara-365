<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Crm\ConversionRateController;
use App\Http\Controllers\Api\Crm\LeadsBySourceController;
use App\Http\Controllers\Api\Crm\LeadsOverTimeController;
use App\Http\Controllers\Api\Crm\OpportunitiesController;
use App\Http\Controllers\Api\Crm\PipelineOverviewController;
use App\Http\Controllers\Api\Crm\QualifiedLeadsController;
use App\Http\Controllers\Api\Crm\RecentLeadsController;
use App\Http\Controllers\Api\Crm\TopOpportunitiesController;
use App\Http\Controllers\Api\Crm\TotalLeadsController;
use App\Http\Controllers\Api\Crm\WonDealsController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DailySummeryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\HrOverviewController;
use App\Http\Controllers\Api\InventorySummeryController;
use App\Http\Controllers\Api\ProjectOverviewController;
use App\Http\Controllers\Api\RevenueOverviewController;
use App\Http\Controllers\Api\SalesDashboard\SalesDashboardSummaryController;
use App\Http\Controllers\Api\SalesDashboard\SalesOverTimeController;
use App\Http\Controllers\Api\SalesDashboard\SalesRecentOrdersController;
use App\Http\Controllers\Api\SalesDashboard\SalesTopCustomersController;
use App\Http\Controllers\Api\SalesDashboard\SalesTopProductsController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\UsersRolesController;
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
Route::get('/pub/get-all-users-roles', [UsersRolesController::class, 'getAllUsersRoles']);
Route::get('/pub/sales-by-category', [SalesController::class, 'salesByCategory']);
Route::get('/pub/sales-dashboard/summary', [SalesDashboardSummaryController::class, 'getSalesDashboardSummary']);
Route::get('/pub/sales-dashboard/sales-over-time', [SalesOverTimeController::class, 'getSalesOverTime']);
Route::get('/pub/sales-dashboard/top-products', [SalesTopProductsController::class, 'getSalesTopProducts']);
Route::get('/pub/sales-dashboard/recent-orders', [SalesRecentOrdersController::class, 'getSalesRecentOrders']);
Route::get('/pub/sales-dashboard/top-customers', [SalesTopCustomersController::class, 'getSalesTopCustomers']);
Route::get('/pub/crm/total-leads', [TotalLeadsController::class, 'getTotalLeads']);
Route::get('/pub/crm/qualified-leads', [QualifiedLeadsController::class, 'getQualifiedLeads']);
Route::get('/pub/crm/opportunities', [OpportunitiesController::class, 'getOpportunities']);
Route::get('/pub/crm/won-deals', [WonDealsController::class, 'getWonDeals']);
Route::get('/pub/crm/conversion-rate', [ConversionRateController::class, 'getConversionRate']);
Route::get('/pub/crm/leads-over-time', [LeadsOverTimeController::class, 'getLeadsOverTime']);
Route::get('/pub/crm/leads-by-source', [LeadsBySourceController::class, 'getLeadsBySource']);
Route::get('/pub/crm/pipeline-overview', [PipelineOverviewController::class, 'getPipelineOverview']);
Route::get('/pub/crm/recent-leads', [RecentLeadsController::class, 'getRecentLeads']);
Route::get('/pub/crm/top-opportunities', [TopOpportunitiesController::class, 'getTopOpportunities']);

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
    Route::get('/get-all-users-roles', [UsersRolesController::class, 'getAllUsersRoles']);
    Route::get('/sales-by-category', [SalesController::class, 'salesByCategory']);
    Route::get('/sales-dashboard/summary', [SalesDashboardSummaryController::class, 'getSalesDashboardSummary']);
    Route::get('/sales-dashboard/sales-over-time', [SalesOverTimeController::class, 'getSalesOverTime']);
    Route::get('/sales-dashboard/top-products', [SalesTopProductsController::class, 'getSalesTopProducts']);
    Route::get('/sales-dashboard/recent-orders', [SalesRecentOrdersController::class, 'getSalesRecentOrders']);
    Route::get('/sales-dashboard/top-customers', [SalesTopCustomersController::class, 'getSalesTopCustomers']);
    Route::get('/crm/total-leads', [TotalLeadsController::class, 'getTotalLeads']);
    Route::get('/crm/qualified-leads', [QualifiedLeadsController::class, 'getQualifiedLeads']);
    Route::get('/crm/opportunities', [OpportunitiesController::class, 'getOpportunities']);
    Route::get('/crm/won-deals', [WonDealsController::class, 'getWonDeals']);
    Route::get('/crm/conversion-rate', [ConversionRateController::class, 'getConversionRate']);
    Route::get('/crm/leads-over-time', [LeadsOverTimeController::class, 'getLeadsOverTime']);
    Route::get('/crm/leads-by-source', [LeadsBySourceController::class, 'getLeadsBySource']);
    Route::get('/crm/pipeline-overview', [PipelineOverviewController::class, 'getPipelineOverview']);
    Route::get('/crm/recent-leads', [RecentLeadsController::class, 'getRecentLeads']);
    Route::get('/crm/top-opportunities', [TopOpportunitiesController::class, 'getTopOpportunities']);
});
