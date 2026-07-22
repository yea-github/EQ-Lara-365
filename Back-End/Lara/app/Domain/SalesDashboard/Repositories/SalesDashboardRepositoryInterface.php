<?php

namespace App\Domain\SalesDashboard\Repositories;

use Illuminate\Support\Collection;

interface SalesDashboardRepositoryInterface
{
    public function summary(?int $year = null, ?string $month = null): Collection;
    public function salesOverTime(): Collection;
    public function topProducts(): Collection;
    public function recentOrders(): Collection;
    public function topCustomers(): Collection;
}
