<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\HrOverview\Repositories\HrOverviewRepositoryInterface;
use App\Models\HrOverview;
use Illuminate\Support\Collection;

class EloquentHrOverviewRepository implements HrOverviewRepositoryInterface
{
    /**
     * @return Collection<int, HrOverview>
     */
    public function all(): Collection
    {
        return HrOverview::query()
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderBy('Id')
            ->get();
    }
}
