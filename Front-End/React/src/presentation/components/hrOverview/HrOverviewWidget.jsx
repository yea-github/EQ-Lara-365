import React from 'react'
import HrOverviewService from '../../../application/hrOverview/HrOverviewService.js'
import ReportingPeriod, {
  REPORTING_MONTHS,
  REPORTING_YEARS,
} from '../../../domain/dashboard/ReportingPeriod.js'
import HrOverviewApiRepository from '../../../infrastructure/api/HrOverviewApiRepository.js'

class HrOverviewWidget extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new HrOverviewApiRepository()
    this.service = new HrOverviewService(this.repository)
    this.state = {
      records: [],
      selectedYear: ReportingPeriod.defaultYear(),
      selectedMonth: ReportingPeriod.defaultMonth(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadHrOverview()
  }

  async loadHrOverview() {
    try {
      const records = await this.service.loadHrOverview()
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

  renderMetrics(overview) {
    return (
      <div className="hr-overview-metrics">
        {this.service.metricCards(overview).map((metric) => (
          <article key={metric.key} className={`hr-overview-metric hr-overview-metric-${metric.tone}`}>
            <strong>{metric.value.toLocaleString()}</strong>
            <span>{metric.label}</span>
          </article>
        ))}
      </div>
    )
  }

  renderHeadcount(overview) {
    const departments = this.service.departmentHeadcounts(overview)
    const maxValue = Math.max(...departments.map((department) => department.value))

    return (
      <div className="hr-overview-headcount">
        <h3>Department Wise Headcount</h3>
        <ul>
          {departments.map((department) => (
            <li key={department.department}>
              <span className="hr-overview-department">{department.department}</span>
              <span className="hr-overview-bar-track">
                <span
                  className="hr-overview-bar"
                  style={{ width: `${(department.value / maxValue) * 100}%` }}
                />
              </span>
              <strong>{department.value}</strong>
            </li>
          ))}
        </ul>
      </div>
    )
  }

  renderContent() {
    if (this.state.loading) {
      return <div className="hr-overview-status">Loading...</div>
    }

    if (this.state.error) {
      return <div className="hr-overview-status">{this.state.error}</div>
    }

    const overview = this.overview()

    if (!overview) {
      return <div className="hr-overview-status">No data found</div>
    }

    return (
      <>
        {this.renderMetrics(overview)}
        {this.renderHeadcount(overview)}
      </>
    )
  }

  render() {
    return (
      <section className="hr-overview-card" aria-label="HR overview">
        <header className="hr-overview-header">
          <h2>HR Overview</h2>
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

export default HrOverviewWidget
