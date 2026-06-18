<?php

namespace App\Application\RevenueOverview;

use App\Domain\RevenueOverview\Repositories\RevenueOverviewRepositoryInterface;
use App\Models\RevenueOverview;

class GetRevenueOverviewAction
{
    public function __construct(
        private readonly RevenueOverviewRepositoryInterface $revenueOverview
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->revenueOverview
            ->all()
            ->map(fn (RevenueOverview $revenueOverview): array => $this->revenueOverviewResponse($revenueOverview))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function revenueOverviewResponse(RevenueOverview $revenueOverview): array
    {
        return [
            'Id' => $revenueOverview->Id,
            'Year' => $revenueOverview->Year,
            'Month' => $revenueOverview->Month,
            'Revenue' => $revenueOverview->Revenue,
            'Expenses' => $revenueOverview->Expenses,
        ];
    }
}
