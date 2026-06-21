import React from 'react'
import InventorySummeryTableService from '../../../application/inventorySummery/InventorySummeryTableService.js'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import ReportingPeriod, {
  REPORTING_MONTHS,
  REPORTING_YEARS,
} from '../../../domain/dashboard/ReportingPeriod.js'
import InventorySummeryApiRepository from '../../../infrastructure/api/InventorySummeryApiRepository.js'

class InventorySummeryTable extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new InventorySummeryApiRepository()
    this.service = new InventorySummeryTableService(this.repository)
    this.state = {
      records: [],
      selectedYear: ReportingPeriod.defaultYear(),
      selectedMonth: ReportingPeriod.defaultMonth(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadInventorySummery()
  }

  async loadInventorySummery() {
    try {
      const records = await this.service.loadInventorySummery()
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

  entries() {
    return this.service.entriesByPeriod(
      this.state.records,
      this.state.selectedYear,
      this.state.selectedMonth,
    )
  }

  renderRows(entries) {
    return entries.map((entry) => (
      <tr key={entry.Id}>
        <td>{entry.item_categorie}</td>
        <td>{entry.items.toLocaleString()}</td>
        <td>{entry.qty_in_hand.toLocaleString()}</td>
        <td>€ {MetricFormatter.number(entry.value)}</td>
      </tr>
    ))
  }

  renderContent() {
    if (this.state.loading) {
      return <div className="inventory-summery-status">Loading...</div>
    }

    if (this.state.error) {
      return <div className="inventory-summery-status">{this.state.error}</div>
    }

    const entries = this.entries()

    if (entries.length === 0) {
      return <div className="inventory-summery-status">No data found</div>
    }

    return (
      <div className="inventory-summery-table-wrap">
        <table className="inventory-summery-table">
          <thead>
            <tr>
              <th>Item Category</th>
              <th>Items</th>
              <th>Qty in Hand</th>
              <th>Value (€)</th>
            </tr>
          </thead>
          <tbody>{this.renderRows(entries)}</tbody>
        </table>
      </div>
    )
  }

  render() {
    return (
      <section className="inventory-summery-card" aria-label="Inventory summary table">
        <header className="inventory-summery-header">
          <h2>Inventory Summary</h2>
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

export default InventorySummeryTable
