<?php

namespace App\Domain\CrmDashboard\Repositories;

use Illuminate\Support\Collection;

interface CrmDashboardRepositoryInterface
{
    public function leadsOverTime(): Collection;

    public function leadsBySource(): Collection;

    public function pipelineOverview(): Collection;

    public function recentLeads(): Collection;

    public function topOpportunities(): Collection;
}
