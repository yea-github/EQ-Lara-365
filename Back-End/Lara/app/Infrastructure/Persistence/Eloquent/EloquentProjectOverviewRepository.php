<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\ProjectOverview\Repositories\ProjectOverviewRepositoryInterface;
use App\Models\ProjectOverview;
use Illuminate\Support\Collection;

class EloquentProjectOverviewRepository implements ProjectOverviewRepositoryInterface
{
    /**
     * @return Collection<int, ProjectOverview>
     */
    public function all(): Collection
    {
        return ProjectOverview::query()
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderBy('Id')
            ->get();
    }
}
