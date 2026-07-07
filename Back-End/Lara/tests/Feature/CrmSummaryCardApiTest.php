<?php

namespace Tests\Feature;

use App\Application\CrmSummaryCard\GetCrmSummaryCardAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class CrmSummaryCardApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_crm_summary_card_routes_require_authentication(): void
    {
        foreach ($this->endpoints() as $endpoint) {
            $this->getJson($endpoint['auth'])->assertUnauthorized();
        }
    }

    public function test_public_crm_summary_card_routes_do_not_require_authentication(): void
    {
        foreach ($this->endpoints() as $endpoint) {
            $this->assertEndpointPayload($endpoint['public'], $endpoint['metric']);
        }
    }

    public function test_authenticated_user_can_get_crm_summary_cards(): void
    {
        $this->withoutMiddleware();

        foreach ($this->endpoints() as $endpoint) {
            $this->assertEndpointPayload($endpoint['auth'], $endpoint['metric']);
        }
    }

    /**
     * @return array<int, array{auth: string, public: string, metric: string}>
     */
    private function endpoints(): array
    {
        return [
            ['auth' => '/api/crm/total-leads', 'public' => '/api/pub/crm/total-leads', 'metric' => 'total_leads'],
            ['auth' => '/api/crm/qualified-leads', 'public' => '/api/pub/crm/qualified-leads', 'metric' => 'qualified_leads'],
            ['auth' => '/api/crm/opportunities', 'public' => '/api/pub/crm/opportunities', 'metric' => 'opportunities'],
            ['auth' => '/api/crm/won-deals', 'public' => '/api/pub/crm/won-deals', 'metric' => 'won_deals'],
            ['auth' => '/api/crm/conversion-rate', 'public' => '/api/pub/crm/conversion-rate', 'metric' => 'conversion_rate'],
        ];
    }

    private function assertEndpointPayload(string $url, string $metric): void
    {
        $payload = [
            [
                'Id' => 1,
                'metric_key' => $metric,
                'title' => 'CRM Metric',
                'year' => 2026,
                'month' => 'June',
                'value' => 1256,
                'change_percent' => 18.5,
            ],
        ];

        $action = Mockery::mock(GetCrmSummaryCardAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->with($metric)
            ->andReturn($payload);

        $this->app->instance(GetCrmSummaryCardAction::class, $action);

        $this->getJson($url)
            ->assertOk()
            ->assertExactJson($payload);
    }
}
