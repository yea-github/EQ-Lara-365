<?php

namespace App\Application\SalesDashboard;

use App\Domain\SalesDashboard\Repositories\SalesDashboardRepositoryInterface;

class GetSalesTopCustomersAction
{
    public function __construct(private readonly SalesDashboardRepositoryInterface $salesDashboard) {}

    public function execute(): array
    {
        return $this->salesDashboard->topCustomers()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'customer' => $row->customer,
            'orders' => $row->orders,
            'total_sales' => $row->total_sales,
            'outstanding' => $row->outstanding,
        ])->all();
    }
}
