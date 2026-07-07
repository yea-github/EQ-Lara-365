import React from 'react'
import CrmSummaryCardService from '../../../application/crm/CrmSummaryCardService.js'
import CrmReportingPeriod, {
  CRM_REPORTING_YEARS,
} from '../../../domain/crm/CrmReportingPeriod.js'

class CrmSummaryCard extends React.Component {
  constructor(props) {
    super(props)
    this.service = new CrmSummaryCardService()
    this.state = {
      year: CrmReportingPeriod.defaultYear(),
      month: CrmReportingPeriod.defaultMonth(),
    }
  }

  handleYearChange = (event) => {
    const year = event.target.value

    this.setState((state) => ({
      year,
      month: CrmReportingPeriod.normalizeMonth(year, state.month),
    }))
  }

  handleMonthChange = (event) => {
    this.setState({ month: event.target.value })
  }

  currentRecord() {
    return this.service.findByPeriod(this.props.records, this.state.year, this.state.month)
  }

  renderChange(record) {
    if (!record) {
      return <span className="crm-card-change crm-card-change-muted">No data found</span>
    }

    return (
      <span className="crm-card-change">
        <i className="bx bx-up-arrow-alt" aria-hidden="true" />
        {record.changePercent.toFixed(1)}% <span>vs last month</span>
      </span>
    )
  }

  render() {
    const { metric, records, loading, error } = this.props
    const record = this.currentRecord()
    const months = CrmReportingPeriod.monthsForYear(this.state.year)

    return (
      <article className={`crm-summary-card crm-summary-card-${metric.tone}`}>
        <div className="crm-card-main">
          <div className="crm-card-icon" aria-hidden="true">
            <i className={`bx ${metric.icon}`} />
          </div>
          <div className="crm-card-content">
            <h2>{metric.title}</h2>
            <p>{loading ? 'Loading...' : this.service.displayValue(record, metric)}</p>
            {error ? (
              <span className="crm-card-change crm-card-change-muted">{error}</span>
            ) : (
              !loading && records.length > 0 && this.renderChange(record)
            )}
          </div>
        </div>
        <div className="crm-card-filters">
          <label>
            <span>Year</span>
            <select value={this.state.year} onChange={this.handleYearChange}>
              {CRM_REPORTING_YEARS.map((year) => (
                <option key={year} value={year}>
                  {year}
                </option>
              ))}
            </select>
          </label>
          <label>
            <span>Month</span>
            <select value={this.state.month} onChange={this.handleMonthChange}>
              {months.map((month) => (
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

export default CrmSummaryCard
