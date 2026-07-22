<?php

namespace App\Application\SalesDashboard;

use App\Domain\SalesDashboard\Repositories\SalesDashboardRepositoryInterface;

class GetSalesDashboardSummaryAction
{
    public function __construct(private readonly SalesDashboardRepositoryInterface $salesDashboard) {}

    public function execute(?int $year = null, ?string $month = null): array
    {
        return $this->salesDashboard->summary($year, $month)->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'total_sales' => $row->total_sales,
            'total_orders' => $row->total_orders,
            'average_order_value' => $row->average_order_value,
            'conversion_rate' => (float) $row->conversion_rate,
            'return_rate' => (float) $row->return_rate,
            'total_sales_change' => (float) $row->total_sales_change,
            'total_orders_change' => (float) $row->total_orders_change,
            'average_order_value_change' => (float) $row->average_order_value_change,
            'conversion_rate_change' => (float) $row->conversion_rate_change,
            'return_rate_change' => (float) $row->return_rate_change,
        ])->all();
    }
}
