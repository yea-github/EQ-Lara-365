<?php

namespace App\Application\Sales;

use App\Domain\Sales\Repositories\SalesRepositoryInterface;
use App\Models\Sale;

class GetSalesByCategoryAction
{
    public function __construct(
        private readonly SalesRepositoryInterface $sales
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->sales
            ->allByCategory()
            ->map(fn (Sale $sale): array => $this->saleResponse($sale))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function saleResponse(Sale $sale): array
    {
        return [
            'Id' => $sale->Id,
            'year' => $sale->year,
            'month' => $sale->month,
            'category_name' => $sale->category_name,
            'sales_by_percentage' => $sale->sales_by_percentage,
            'total_sales_price' => $sale->total_sales_price,
        ];
    }
}
