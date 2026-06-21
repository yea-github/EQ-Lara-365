class ProjectOverviewChartService {
  constructor(repository) {
    this.repository = repository
  }

  async loadProjectOverview() {
    return this.repository.all()
  }

  overviewByPeriod(records, year, month) {
    return records.find((record) => record.matchesPeriod(year, month)) || null
  }

  chartEntries(overview) {
    if (!overview) {
      return []
    }

    return [
      { key: 'in_progress', label: 'In Progress', value: overview.in_progress },
      { key: 'completed', label: 'Completed', value: overview.completed },
      { key: 'on_hold', label: 'On Hold', value: overview.on_hold },
      { key: 'not_started', label: 'Not Started', value: overview.not_started },
    ]
  }
}

export default ProjectOverviewChartService
