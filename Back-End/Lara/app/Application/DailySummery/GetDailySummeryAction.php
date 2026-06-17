<?php

namespace App\Application\DailySummery;

use App\Domain\DailySummery\Repositories\DailySummeryRepositoryInterface;
use App\Models\DailySummery;

class GetDailySummeryAction
{
    public function __construct(
        private readonly DailySummeryRepositoryInterface $dailySummery
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->dailySummery
            ->all()
            ->map(fn (DailySummery $dailySummery): array => $this->dailySummeryResponse($dailySummery))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function dailySummeryResponse(DailySummery $dailySummery): array
    {
        return [
            'Id' => $dailySummery->Id,
            'year' => $dailySummery->year,
            'month' => $dailySummery->month,
            'total_revenue' => $dailySummery->total_revenue,
            'total_sales_orders' => $dailySummery->total_sales_orders,
            'total_purchase_orders' => $dailySummery->total_purchase_orders,
            'total_inventory_value' => $dailySummery->total_inventory_value,
            'total_outstanding' => $dailySummery->total_outstanding,
        ];
    }
}
