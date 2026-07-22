<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\SalesDashboard\Repositories\SalesDashboardRepositoryInterface;
use App\Models\SalesDashboardSummary;
use App\Models\SalesOverTime;
use App\Models\SalesRecentOrder;
use App\Models\SalesTopCustomer;
use App\Models\SalesTopProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class EloquentSalesDashboardRepository implements SalesDashboardRepositoryInterface
{
    public function summary(?int $year = null, ?string $month = null): Collection
    {
        return $this->filterByPeriod(
            $this->periodOrdered(SalesDashboardSummary::query()),
            $year,
            $month
        )->get();
    }

    public function salesOverTime(): Collection
    {
        return $this->periodOrdered(SalesOverTime::query())
            ->orderByRaw("FIELD(sales_month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')")
            ->get();
    }

    public function topProducts(): Collection
    {
        return $this->periodOrdered(SalesTopProduct::query())->orderByDesc('revenue')->orderBy('Id')->get();
    }

    public function recentOrders(): Collection
    {
        return $this->periodOrdered(SalesRecentOrder::query())->orderByDesc('order_date')->orderByDesc('order_no')->get();
    }

    public function topCustomers(): Collection
    {
        return $this->periodOrdered(SalesTopCustomer::query())->orderByDesc('total_sales')->orderBy('Id')->get();
    }

    private function periodOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('year')
            ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')");
    }

    private function filterByPeriod(Builder $query, ?int $year, ?string $month): Builder
    {
        if ($year !== null) {
            $query->where('year', $year);
        }

        if ($month !== null && $month !== '') {
            $query->where('month', $month);
        }

        return $query;
    }
}
