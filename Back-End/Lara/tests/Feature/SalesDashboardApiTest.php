<?php

namespace Tests\Feature;

use App\Application\SalesDashboard\GetSalesDashboardSummaryAction;
use App\Application\SalesDashboard\GetSalesOverTimeAction;
use App\Application\SalesDashboard\GetSalesRecentOrdersAction;
use App\Application\SalesDashboard\GetSalesTopCustomersAction;
use App\Application\SalesDashboard\GetSalesTopProductsAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class SalesDashboardApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_sales_dashboard_routes_require_authentication(): void
    {
        foreach ($this->endpoints() as $endpoint) {
            $this->getJson($endpoint['auth'])->assertUnauthorized();
        }
    }

    public function test_public_sales_dashboard_routes_do_not_require_authentication(): void
    {
        foreach ($this->endpoints() as $endpoint) {
            $this->assertEndpointPayload($endpoint['public'], $endpoint['action'], $endpoint['payload']);
        }
    }

    public function test_authenticated_user_can_get_sales_dashboard_payloads(): void
    {
        $this->withoutMiddleware();

        foreach ($this->endpoints() as $endpoint) {
            $this->assertEndpointPayload($endpoint['auth'], $endpoint['action'], $endpoint['payload']);
        }
    }

    public function test_sales_dashboard_summary_can_be_filtered_by_period(): void
    {
        $payload = [
            [
                'Id' => 1,
                'year' => 2026,
                'month' => 'June',
                'total_sales' => 124580000,
            ],
        ];

        $action = Mockery::mock(GetSalesDashboardSummaryAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->with(2026, 'June')
            ->andReturn($payload);

        $this->app->instance(GetSalesDashboardSummaryAction::class, $action);

        $this->getJson('/api/pub/sales-dashboard/summary?year=2026&month=June')
            ->assertOk()
            ->assertExactJson($payload);
    }

    /**
     * @return array<int, array{auth: string, public: string, action: class-string, payload: array<int, array<string, mixed>>}>
     */
    private function endpoints(): array
    {
        return [
            [
                'auth' => '/api/sales-dashboard/summary',
                'public' => '/api/pub/sales-dashboard/summary',
                'action' => GetSalesDashboardSummaryAction::class,
                'payload' => [
                    [
                        'Id' => 1,
                        'year' => 2026,
                        'month' => 'June',
                        'total_sales' => 124580000,
                    ],
                ],
            ],
            [
                'auth' => '/api/sales-dashboard/sales-over-time',
                'public' => '/api/pub/sales-dashboard/sales-over-time',
                'action' => GetSalesOverTimeAction::class,
                'payload' => [
                    [
                        'Id' => 1,
                        'year' => 2026,
                        'month' => 'June',
                        'chart_month' => 'Jan',
                        'sales_amount_millions' => 2.00,
                    ],
                ],
            ],
            [
                'auth' => '/api/sales-dashboard/top-products',
                'public' => '/api/pub/sales-dashboard/top-products',
                'action' => GetSalesTopProductsAction::class,
                'payload' => [
                    [
                        'Id' => 1,
                        'year' => 2026,
                        'month' => 'June',
                        'product' => 'Product A',
                        'sales' => 1245,
                    ],
                ],
            ],
            [
                'auth' => '/api/sales-dashboard/recent-orders',
                'public' => '/api/pub/sales-dashboard/recent-orders',
                'action' => GetSalesRecentOrdersAction::class,
                'payload' => [
                    [
                        'Id' => 1,
                        'year' => 2026,
                        'month' => 'June',
                        'order_no' => 'SO-2026-1054',
                        'customer' => 'Alpha Enterprises',
                    ],
                ],
            ],
            [
                'auth' => '/api/sales-dashboard/top-customers',
                'public' => '/api/pub/sales-dashboard/top-customers',
                'action' => GetSalesTopCustomersAction::class,
                'payload' => [
                    [
                        'Id' => 1,
                        'year' => 2026,
                        'month' => 'June',
                        'customer' => 'Alpha Enterprises',
                        'orders' => 125,
                    ],
                ],
            ],
        ];
    }

    /**
     * @param class-string $actionClass
     * @param array<int, array<string, mixed>> $payload
     */
    private function assertEndpointPayload(string $url, string $actionClass, array $payload): void
    {
        $action = Mockery::mock($actionClass);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn($payload);

        $this->app->instance($actionClass, $action);

        $this->getJson($url)
            ->assertOk()
            ->assertExactJson($payload);
    }
}
