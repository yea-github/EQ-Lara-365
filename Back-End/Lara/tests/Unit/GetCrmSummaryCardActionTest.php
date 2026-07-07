<?php

namespace Tests\Unit;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use App\Domain\CrmSummaryCard\Repositories\CrmSummaryCardRepositoryInterface;
use App\Models\CrmSummaryCard;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetCrmSummaryCardActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_crm_summary_cards_as_json_ready_arrays(): void
    {
        $card = new CrmSummaryCard([
            'metric_key' => 'total_leads',
            'title' => 'Total Leads',
            'year' => 2026,
            'month' => 'June',
            'value' => 1256,
            'change_percent' => 18.5,
        ]);
        $card->Id = 1;

        $repository = Mockery::mock(CrmSummaryCardRepositoryInterface::class);
        $repository
            ->shouldReceive('byMetric')
            ->once()
            ->with('total_leads')
            ->andReturn(collect([$card]));

        $action = new GetCrmSummaryCardAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'metric_key' => 'total_leads',
                'title' => 'Total Leads',
                'year' => 2026,
                'month' => 'June',
                'value' => 1256,
                'change_percent' => 18.5,
            ],
        ], $action->execute('total_leads'));
    }
}
