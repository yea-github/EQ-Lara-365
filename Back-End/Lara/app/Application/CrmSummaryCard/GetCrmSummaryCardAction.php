<?php

namespace App\Application\CrmSummaryCard;

use App\Domain\CrmSummaryCard\Repositories\CrmSummaryCardRepositoryInterface;
use App\Models\CrmSummaryCard;

class GetCrmSummaryCardAction
{
    public function __construct(
        private readonly CrmSummaryCardRepositoryInterface $crmSummaryCards
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(string $metricKey): array
    {
        return $this->crmSummaryCards
            ->byMetric($metricKey)
            ->map(fn (CrmSummaryCard $card): array => $this->cardResponse($card))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function cardResponse(CrmSummaryCard $card): array
    {
        $value = (float) $card->value;

        if ($card->metric_key !== 'conversion_rate') {
            $value = (int) $value;
        }

        return [
            'Id' => $card->Id,
            'metric_key' => $card->metric_key,
            'title' => $card->title,
            'year' => $card->year,
            'month' => $card->month,
            'value' => $value,
            'change_percent' => (float) $card->change_percent,
        ];
    }
}
