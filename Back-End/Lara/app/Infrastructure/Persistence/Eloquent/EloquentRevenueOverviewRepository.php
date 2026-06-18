<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\RevenueOverview\Repositories\RevenueOverviewRepositoryInterface;
use App\Models\RevenueOverview;
use Illuminate\Support\Collection;

class EloquentRevenueOverviewRepository implements RevenueOverviewRepositoryInterface
{
    /**
     * @return Collection<int, RevenueOverview>
     */
    public function all(): Collection
    {
        return RevenueOverview::query()
            ->orderBy('Year')
            ->orderByRaw("FIELD(Month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderBy('Id')
            ->get();
    }
}
