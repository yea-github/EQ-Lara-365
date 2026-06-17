<?php

namespace App\Application\HrOverview;

use App\Domain\HrOverview\Repositories\HrOverviewRepositoryInterface;
use App\Models\HrOverview;

class GetHrOverviewAction
{
    public function __construct(
        private readonly HrOverviewRepositoryInterface $hrOverview
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->hrOverview
            ->all()
            ->map(fn (HrOverview $hrOverview): array => $this->hrOverviewResponse($hrOverview))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function hrOverviewResponse(HrOverview $hrOverview): array
    {
        return [
            'Id' => $hrOverview->Id,
            'year' => $hrOverview->year,
            'month' => $hrOverview->month,
            'total_employees' => $hrOverview->total_employees,
            'new_joines' => $hrOverview->new_joines,
            'on_leave' => $hrOverview->on_leave,
            'open_positions' => $hrOverview->open_positions,
        ];
    }
}
