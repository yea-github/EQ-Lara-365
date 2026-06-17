<?php

namespace App\Application\ProjectOverview;

use App\Domain\ProjectOverview\Repositories\ProjectOverviewRepositoryInterface;
use App\Models\ProjectOverview;

class GetProjectOverviewAction
{
    public function __construct(
        private readonly ProjectOverviewRepositoryInterface $projectOverview
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->projectOverview
            ->all()
            ->map(fn (ProjectOverview $projectOverview): array => $this->projectOverviewResponse($projectOverview))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function projectOverviewResponse(ProjectOverview $projectOverview): array
    {
        return [
            'Id' => $projectOverview->Id,
            'year' => $projectOverview->year,
            'month' => $projectOverview->month,
            'in_progress' => $projectOverview->in_progress,
            'completed' => $projectOverview->completed,
            'on_hold' => $projectOverview->on_hold,
            'not_started' => $projectOverview->not_started,
        ];
    }
}
