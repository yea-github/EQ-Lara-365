import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import ProjectOverviewChartService from '../../../application/projectOverview/ProjectOverviewChartService.js'
import ReportingPeriod, {
  REPORTING_MONTHS,
  REPORTING_YEARS,
} from '../../../domain/dashboard/ReportingPeriod.js'
import ProjectOverviewApiRepository from '../../../infrastructure/api/ProjectOverviewApiRepository.js'

const PROJECT_STATUS_COLORS = ['#2f73ff', '#5fc96f', '#ffb423', '#cbd3e1']

class ProjectOverviewChart extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new ProjectOverviewApiRepository()
    this.service = new ProjectOverviewChartService(this.repository)
    this.state = {
      records: [],
      selectedYear: ReportingPeriod.defaultYear(),
      selectedMonth: ReportingPeriod.defaultMonth(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadProjectOverview()
  }

  async loadProjectOverview() {
    try {
      const records = await this.service.loadProjectOverview()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  handleYearChange = (event) => {
    this.setState({ selectedYear: event.target.value })
  }

  handleMonthChange = (event) => {
    this.setState({ selectedMonth: event.target.value })
  }

  overview() {
    return this.service.overviewByPeriod(
      this.state.records,
      this.state.selectedYear,
      this.state.selectedMonth,
    )
  }

  chartData(entries) {
    return {
      labels: entries.map((entry) => entry.label),
      datasets: [
        {
          data: entries.map((entry) => entry.value),
          backgroundColor: PROJECT_STATUS_COLORS,
          borderColor: '#ffffff',
          borderWidth: 4,
          hoverOffset: 5,
        },
      ],
    }
  }

  chartOptions() {
    return {
      maintainAspectRatio: false,
      responsive: true,
      cutout: '58%',
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          callbacks: {
            label: (context) => `${context.label}: ${context.parsed}`,
          },
        },
      },
    }
  }

  renderLegend(entries) {
    return (
      <ul className="project-overview-legend">
        {entries.map((entry, index) => (
          <li key={entry.key}>
            <span
              className="project-overview-dot"
              style={{ backgroundColor: PROJECT_STATUS_COLORS[index] }}
            />
            <strong>{entry.value}</strong>
            <span>{entry.label}</span>
          </li>
        ))}
      </ul>
    )
  }

  renderContent() {
    if (this.state.loading) {
      return <div className="project-overview-status">Loading...</div>
    }

    if (this.state.error) {
      return <div className="project-overview-status">{this.state.error}</div>
    }

    const overview = this.overview()
    const entries = this.service.chartEntries(overview)

    if (!overview || entries.every((entry) => entry.value === 0)) {
      return <div className="project-overview-status">No data found</div>
    }

    return (
      <div className="project-overview-content">
        <div className="project-overview-chart">
          <Chart type="doughnut" data={this.chartData(entries)} options={this.chartOptions()} />
          <div className="project-overview-total" aria-hidden="true">
            <strong>{overview.totalProjects()}</strong>
            <span>Total Projects</span>
          </div>
        </div>
        {this.renderLegend(entries)}
      </div>
    )
  }

  render() {
    return (
      <section className="project-overview-card" aria-label="Project overview chart">
        <header className="project-overview-header">
          <h2>Project Overview</h2>
          <div className="dashboard-widget-filters">
            <label>
              <span>Year</span>
              <select value={this.state.selectedYear} onChange={this.handleYearChange}>
                {REPORTING_YEARS.map((year) => (
                  <option key={year} value={year}>
                    {year}
                  </option>
                ))}
              </select>
            </label>
            <label>
              <span>Month</span>
              <select value={this.state.selectedMonth} onChange={this.handleMonthChange}>
                {REPORTING_MONTHS.map((month) => (
                  <option key={month} value={month}>
                    {month}
                  </option>
                ))}
              </select>
            </label>
          </div>
        </header>
        {this.renderContent()}
      </section>
    )
  }
}

export default ProjectOverviewChart
