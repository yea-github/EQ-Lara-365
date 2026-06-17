<?php

namespace App\Application\InventorySummery;

use App\Domain\InventorySummery\Repositories\InventorySummeryRepositoryInterface;
use App\Models\InventorySummery;

class GetInventorySummeryAction
{
    public function __construct(
        private readonly InventorySummeryRepositoryInterface $inventorySummery
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->inventorySummery
            ->all()
            ->map(fn (InventorySummery $inventorySummery): array => $this->inventorySummeryResponse($inventorySummery))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function inventorySummeryResponse(InventorySummery $inventorySummery): array
    {
        return [
            'Id' => $inventorySummery->Id,
            'year' => $inventorySummery->year,
            'month' => $inventorySummery->month,
            'item_categorie' => $inventorySummery->item_categorie,
            'items' => $inventorySummery->items,
            'qty_in_hand' => $inventorySummery->qty_in_hand,
            'value' => $inventorySummery->value,
        ];
    }
}
