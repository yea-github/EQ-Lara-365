import React from 'react'
import DailySummeryDashboardService from '../../../application/dashboard/DailySummeryDashboardService.js'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import { REPORTING_MONTHS, REPORTING_YEARS } from '../../../domain/dashboard/ReportingPeriod.js'

class BaseSummaryCard extends React.Component {
  constructor(props) {
    super(props)
    this.service = new DailySummeryDashboardService(props.repository)
    this.state = {
      year: props.defaultYear,
      month: props.defaultMonth,
    }
  }

  handleYearChange = (event) => {
    this.setState({ year: event.target.value })
  }

  handleMonthChange = (event) => {
    this.setState({ month: event.target.value })
  }

  currentRecord() {
    return this.service.findByPeriod(this.props.records, this.state.year, this.state.month)
  }

  currentValue(record) {
    return record ? record[this.props.metric.field] : null
  }

  changePercent(currentValue) {
    const previousValue = this.service.previousValue(
      this.props.records,
      this.state.year,
      this.state.month,
      this.props.metric.field,
    )

    return MetricFormatter.change(currentValue, previousValue)
  }

  renderChange(currentValue) {
    if (currentValue === null || currentValue === undefined) {
      return <span className="summary-card-change summary-card-change-muted">No data found</span>
    }

    const change = this.changePercent(currentValue)

    if (change === null || Number.isNaN(change)) {
      return <span className="summary-card-change summary-card-change-muted">No previous data</span>
    }

    const directionClass = change >= 0 ? 'summary-card-change-up' : 'summary-card-change-down'
    const sign = change >= 0 ? '+' : ''

    return (
      <span className={`summary-card-change ${directionClass}`}>
        {sign}
        {change.toFixed(1)}% <span>vs last month</span>
      </span>
    )
  }

  render() {
    const { metric, loading, error } = this.props
    const record = this.currentRecord()
    const value = this.currentValue(record)

    return (
      <article className={`summary-card summary-card-${metric.tone}`}>
        <div className="summary-card-main">
          <div className="summary-card-icon" aria-hidden="true">
            <i className={`bx ${metric.icon}`} />
          </div>
          <div className="summary-card-content">
            <h2 className="summary-card-title">{metric.title}</h2>
            <p className="summary-card-value">
              {loading ? 'Loading...' : MetricFormatter.metric(value, metric.format)}
            </p>
            {error ? (
              <p className="summary-card-error">{error}</p>
            ) : (
              !loading && this.renderChange(value)
            )}
          </div>
        </div>
        <div className="summary-card-filters">
          <label>
            <span>Year</span>
            <select value={this.state.year} onChange={this.handleYearChange}>
              {REPORTING_YEARS.map((year) => (
                <option key={year} value={year}>
                  {year}
                </option>
              ))}
            </select>
          </label>
          <label>
            <span>Month</span>
            <select value={this.state.month} onChange={this.handleMonthChange}>
              {REPORTING_MONTHS.map((month) => (
                <option key={month} value={month}>
                  {month}
                </option>
              ))}
            </select>
          </label>
        </div>
      </article>
    )
  }
}

export default BaseSummaryCard
