<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\DailySummery\Repositories\DailySummeryRepositoryInterface;
use App\Models\DailySummery;
use Illuminate\Support\Collection;

class EloquentDailySummeryRepository implements DailySummeryRepositoryInterface
{
    /**
     * @return Collection<int, DailySummery>
     */
    public function all(): Collection
    {
        return DailySummery::query()
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderBy('Id')
            ->get();
    }
}
