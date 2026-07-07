<?php

namespace App\Application\CrmDashboard;

use App\Domain\CrmDashboard\Repositories\CrmDashboardRepositoryInterface;

class GetCrmPipelineOverviewAction
{
    public function __construct(private readonly CrmDashboardRepositoryInterface $crmDashboard) {}

    public function execute(): array
    {
        return $this->crmDashboard->pipelineOverview()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'stage' => $row->stage,
            'value' => $row->value,
            'sort_order' => $row->sort_order,
        ])->all();
    }
}
