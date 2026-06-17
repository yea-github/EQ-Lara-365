<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Sales\Repositories\SalesRepositoryInterface;
use App\Models\Sale;
use Illuminate\Support\Collection;

class EloquentSalesRepository implements SalesRepositoryInterface
{
    /**
     * @return Collection<int, Sale>
     */
    public function allByCategory(): Collection
    {
        return Sale::query()
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
            ->orderByDesc('sales_by_percentage')
            ->orderBy('category_name')
            ->orderBy('Id')
            ->get();
    }
}
