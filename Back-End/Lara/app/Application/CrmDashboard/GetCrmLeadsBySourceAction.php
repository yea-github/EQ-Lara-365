<?php

namespace App\Application\CrmDashboard;

use App\Domain\CrmDashboard\Repositories\CrmDashboardRepositoryInterface;

class GetCrmLeadsBySourceAction
{
    public function __construct(private readonly CrmDashboardRepositoryInterface $crmDashboard) {}

    public function execute(): array
    {
        return $this->crmDashboard->leadsBySource()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'source' => $row->source,
            'percentage' => $row->percentage,
        ])->all();
    }
}
