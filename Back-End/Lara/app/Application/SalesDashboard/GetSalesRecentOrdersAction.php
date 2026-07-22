<?php

namespace App\Application\SalesDashboard;

use App\Domain\SalesDashboard\Repositories\SalesDashboardRepositoryInterface;

class GetSalesRecentOrdersAction
{
    public function __construct(private readonly SalesDashboardRepositoryInterface $salesDashboard) {}

    public function execute(): array
    {
        return $this->salesDashboard->recentOrders()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'order_no' => $row->order_no,
            'customer' => $row->customer,
            'date' => $row->order_date->format('d M Y'),
            'amount' => $row->amount,
            'status' => $row->status,
        ])->all();
    }
}
