<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\InventorySummery\Repositories\InventorySummeryRepositoryInterface;
use App\Models\InventorySummery;
use Illuminate\Support\Collection;

class EloquentInventorySummeryRepository implements InventorySummeryRepositoryInterface
{
    /**
     * @return Collection<int, InventorySummery>
     */
    public function all(): Collection
    {
        return InventorySummery::query()
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderBy('Id')
            ->get();
    }
}
