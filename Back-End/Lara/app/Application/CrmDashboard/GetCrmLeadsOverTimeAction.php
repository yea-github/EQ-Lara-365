<?php

namespace App\Application\CrmDashboard;

use App\Domain\CrmDashboard\Repositories\CrmDashboardRepositoryInterface;

class GetCrmLeadsOverTimeAction
{
    public function __construct(private readonly CrmDashboardRepositoryInterface $crmDashboard) {}

    public function execute(): array
    {
        return $this->crmDashboard->leadsOverTime()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'lead_month' => $row->lead_month,
            'leads' => $row->leads,
        ])->all();
    }
}
