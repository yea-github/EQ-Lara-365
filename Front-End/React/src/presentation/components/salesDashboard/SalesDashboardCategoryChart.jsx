import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import SalesDashboardPeriodService from '../../../application/salesDashboard/SalesDashboardPeriodService.js'
import SalesReportingPeriod from '../../../domain/salesDashboard/SalesReportingPeriod.js'
import SalesByCategoryApiRepository from '../../../infrastructure/api/SalesByCategoryApiRepository.js'
import SalesPeriodFilters from './SalesPeriodFilters.jsx'

const CATEGORY_COLORS = ['#2f73ff', '#29b995', '#f7b51b', '#f07057', '#8ea0bd']

class SalesDashboardCategoryChart extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new SalesByCategoryApiRepository()
    this.periodService = new SalesDashboardPeriodService()
    this.state = {
      records: [],
      year: SalesReportingPeriod.defaultYear(),
      month: SalesReportingPeriod.defaultMonth(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadCategories()
  }

  async loadCategories() {
    try {
      const records = await this.repository.all()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  handlePeriodChange = (year, month) => {
    this.setState({ year, month })
  }

  periodRecords() {
    return this.periodService.byPeriod(this.state.records, this.state.year, this.state.month)
  }

  renderContent(records) {
    if (this.state.loading) return <div className="sales-widget-status">Loading...</div>
    if (this.state.error) return <div className="sales-widget-status">{this.state.error}</div>
    if (records.length === 0) return <div className="sales-widget-status">No data found</div>

    return (
      <div className="sales-category-dashboard-content">
        <div className="sales-donut-chart">
          <Chart type="doughnut" data={{ labels: records.map((record) => record.category_name), datasets: [{ data: records.map((record) => record.sales_by_percentage), backgroundColor: CATEGORY_COLORS, borderColor: '#ffffff', borderWidth: 4 }] }} options={{ maintainAspectRatio: false, cutout: '58%', plugins: { legend: { display: false } } }} />
        </div>
        <ul className="sales-dashboard-legend">
          {records.map((record, index) => (
            <li key={record.Id}>
              <span style={{ backgroundColor: CATEGORY_COLORS[index % CATEGORY_COLORS.length] }} />
              <strong>{record.category_name}</strong>
              <em>{record.sales_by_percentage}%</em>
            </li>
          ))}
        </ul>
      </div>
    )
  }

  render() {
    const records = this.periodRecords()

    return (
      <section className="sales-widget-card">
        <header className="sales-widget-header">
          <h2>Sales by Category</h2>
          <SalesPeriodFilters year={this.state.year} month={this.state.month} onChange={this.handlePeriodChange} />
        </header>
        {this.renderContent(records)}
      </section>
    )
  }
}

export default SalesDashboardCategoryChart
