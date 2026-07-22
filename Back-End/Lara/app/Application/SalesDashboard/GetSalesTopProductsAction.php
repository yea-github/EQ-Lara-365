<?php

namespace App\Application\SalesDashboard;

use App\Domain\SalesDashboard\Repositories\SalesDashboardRepositoryInterface;

class GetSalesTopProductsAction
{
    public function __construct(private readonly SalesDashboardRepositoryInterface $salesDashboard) {}

    public function execute(): array
    {
        return $this->salesDashboard->topProducts()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'product' => $row->product,
            'sales' => $row->sales,
            'revenue' => $row->revenue,
        ])->all();
    }
}
