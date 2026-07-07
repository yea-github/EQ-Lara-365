<?php

namespace App\Application\CrmDashboard;

use App\Domain\CrmDashboard\Repositories\CrmDashboardRepositoryInterface;

class GetCrmRecentLeadsAction
{
    public function __construct(private readonly CrmDashboardRepositoryInterface $crmDashboard) {}

    public function execute(): array
    {
        return $this->crmDashboard->recentLeads()->map(fn ($row): array => [
            'Id' => $row->Id,
            'year' => $row->year,
            'month' => $row->month,
            'name' => $row->name,
            'company' => $row->company,
            'source' => $row->source,
            'status' => $row->status,
            'date' => $row->lead_date->format('d M Y'),
        ])->all();
    }
}
