import React from 'react'
import CrmReportingPeriod, { CRM_REPORTING_YEARS } from '../../../domain/crm/CrmReportingPeriod.js'

class CrmPeriodFilters extends React.Component {
  handleYearChange = (event) => {
    const year = event.target.value
    this.props.onChange(year, CrmReportingPeriod.normalizeMonth(year, this.props.month))
  }

  handleMonthChange = (event) => {
    this.props.onChange(this.props.year, event.target.value)
  }

  render() {
    return (
      <div className="crm-widget-filters">
        <label>
          <span>Year</span>
          <select value={this.props.year} onChange={this.handleYearChange}>
            {CRM_REPORTING_YEARS.map((year) => <option key={year} value={year}>{year}</option>)}
          </select>
        </label>
        <label>
          <span>Month</span>
          <select value={this.props.month} onChange={this.handleMonthChange}>
            {CrmReportingPeriod.monthsForYear(this.props.year).map((month) => <option key={month} value={month}>{month}</option>)}
          </select>
        </label>
      </div>
    )
  }
}

export default CrmPeriodFilters
