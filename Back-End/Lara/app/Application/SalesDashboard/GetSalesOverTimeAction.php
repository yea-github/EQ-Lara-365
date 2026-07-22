<?php

namespace App\Application\SalesDashboard;

use App\Domain\SalesDashboard\Repositories\SalesDashboardRepositoryInterface;

class GetSalesOverTimeAction
{
    public function __construct(private readonly SalesDashboardRepositoryInterface $salesDashboard) {}

    public function execute(): array
    {
        return $this->salesDashboard->salesOverTime()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'sales_month' => $row->sales_month,
            'sales_amount' => (float) $row->sales_amount,
        ])->all();
    }
}
