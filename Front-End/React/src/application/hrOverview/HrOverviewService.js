class HrOverviewService {
  constructor(repository) {
    this.repository = repository
  }

  async loadHrOverview() {
    return this.repository.all()
  }

  overviewByPeriod(records, year, month) {
    return records.find((record) => record.matchesPeriod(year, month)) || null
  }

  metricCards(overview) {
    if (!overview) {
      return []
    }

    return [
      {
        key: 'total_employees',
        label: 'Total Employees',
        value: overview.total_employees,
        tone: 'blue',
      },
      {
        key: 'new_joines',
        label: 'New Joinees',
        value: overview.new_joines,
        tone: 'green',
      },
      {
        key: 'on_leave',
        label: 'On Leave',
        value: overview.on_leave,
        tone: 'orange',
      },
      {
        key: 'open_positions',
        label: 'Open Positions',
        value: overview.open_positions,
        tone: 'red',
      },
    ]
  }

  departmentHeadcounts(overview) {
    if (!overview) {
      return []
    }

    const total = overview.total_employees

    return [
      { department: 'Sales & Marketing', value: Math.round(total * 0.22) },
      { department: 'Production', value: Math.round(total * 0.18) },
      { department: 'Finance', value: Math.round(total * 0.14) },
      { department: 'Human Resources', value: Math.round(total * 0.1) },
      { department: 'IT', value: Math.round(total * 0.12) },
      { department: 'Administration', value: Math.round(total * 0.25) },
    ]
  }
}

export default HrOverviewService
