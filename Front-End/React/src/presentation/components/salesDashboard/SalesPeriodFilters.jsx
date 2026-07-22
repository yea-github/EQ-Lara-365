import React from 'react'
import SalesReportingPeriod, { SALES_REPORTING_YEARS } from '../../../domain/salesDashboard/SalesReportingPeriod.js'

class SalesPeriodFilters extends React.Component {
  handleYearChange = (event) => {
    const year = event.target.value
    this.props.onChange(year, SalesReportingPeriod.normalizeMonth(year, this.props.month))
  }

  handleMonthChange = (event) => {
    this.props.onChange(this.props.year, event.target.value)
  }

  render() {
    return (
      <div className={`sales-widget-filters ${this.props.className || ''}`.trim()}>
        <label>
          <span>Year</span>
          <select value={this.props.year} onChange={this.handleYearChange}>
            {SALES_REPORTING_YEARS.map((year) => <option key={year} value={year}>{year}</option>)}
          </select>
        </label>
        <label>
          <span>Month</span>
          <select value={this.props.month} onChange={this.handleMonthChange}>
            {SalesReportingPeriod.monthsForYear(this.props.year).map((month) => <option key={month} value={month}>{month}</option>)}
          </select>
        </label>
      </div>
    )
  }
}

export default SalesPeriodFilters
