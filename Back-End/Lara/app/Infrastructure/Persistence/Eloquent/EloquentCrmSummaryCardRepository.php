<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\CrmSummaryCard\Repositories\CrmSummaryCardRepositoryInterface;
use App\Models\CrmSummaryCard;
use Illuminate\Support\Collection;

class EloquentCrmSummaryCardRepository implements CrmSummaryCardRepositoryInterface
{
    /**
     * @return Collection<int, CrmSummaryCard>
     */
    public function byMetric(string $metricKey): Collection
    {
        return CrmSummaryCard::query()
            ->where('metric_key', $metricKey)
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderBy('Id')
            ->get();
    }
}
