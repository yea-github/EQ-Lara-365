<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\CrmDashboard\Repositories\CrmDashboardRepositoryInterface;
use App\Models\CrmLeadBySource;
use App\Models\CrmLeadOverTime;
use App\Models\CrmPipelineOverview;
use App\Models\CrmRecentLead;
use App\Models\CrmTopOpportunity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class EloquentCrmDashboardRepository implements CrmDashboardRepositoryInterface
{
    public function leadsOverTime(): Collection
    {
        return $this->periodOrdered(CrmLeadOverTime::query())
            ->orderByRaw("FIELD(lead_month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')")
            ->get();
    }

    public function leadsBySource(): Collection
    {
        return $this->periodOrdered(CrmLeadBySource::query())->orderBy('Id')->get();
    }

    public function pipelineOverview(): Collection
    {
        return $this->periodOrdered(CrmPipelineOverview::query())->orderBy('sort_order')->get();
    }

    public function recentLeads(): Collection
    {
        return $this->periodOrdered(CrmRecentLead::query())->orderByDesc('lead_date')->orderBy('Id')->get();
    }

    public function topOpportunities(): Collection
    {
        return $this->periodOrdered(CrmTopOpportunity::query())->orderByDesc('value')->orderBy('Id')->get();
    }

    private function periodOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')");
    }
}
