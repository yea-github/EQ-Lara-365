<?php

namespace App\Application\CrmDashboard;

use App\Domain\CrmDashboard\Repositories\CrmDashboardRepositoryInterface;

class GetCrmTopOpportunitiesAction
{
    public function __construct(private readonly CrmDashboardRepositoryInterface $crmDashboard) {}

    public function execute(): array
    {
        return $this->crmDashboard->topOpportunities()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'opportunity' => $row->opportunity,
            'company' => $row->company,
            'value' => $row->value,
            'stage' => $row->stage,
            'close_date' => $row->close_date->format('d M Y'),
        ])->all();
    }
}
