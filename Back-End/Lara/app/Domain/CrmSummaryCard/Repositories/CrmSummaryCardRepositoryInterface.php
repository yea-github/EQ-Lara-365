<?php

namespace App\Domain\CrmSummaryCard\Repositories;

use Illuminate\Support\Collection;

interface CrmSummaryCardRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\CrmSummaryCard>
     */
    public function byMetric(string $metricKey): Collection;
}
