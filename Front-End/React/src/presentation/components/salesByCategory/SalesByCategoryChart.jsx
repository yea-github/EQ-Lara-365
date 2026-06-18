import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import SalesByCategoryChartService from '../../../application/salesByCategory/SalesByCategoryChartService.js'
import ReportingPeriod, {
  REPORTING_MONTHS,
  REPORTING_YEARS,
} from '../../../domain/dashboard/ReportingPeriod.js'
import SalesByCategoryApiRepository from '../../../infrastructure/api/SalesByCategoryApiRepository.js'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'

const CATEGORY_COLORS = ['#2f73ff', '#23b79b', '#f5b72f', '#a263f4', '#7588a9']

class SalesByCategoryChart extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new SalesByCategoryApiRepository()
    this.service = new SalesByCategoryChartService(this.repository)
    this.state = {
      records: [],
      selectedYear: ReportingPeriod.defaultYear(),
      selectedMonth: ReportingPeriod.defaultMonth(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadSalesByCategory()
  }

  async loadSalesByCategory() {
    try {
      const records = await this.service.loadSalesByCategory()
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

  chartData(entries) {
    return {
      labels: entries.map((entry) => entry.category_name),
      datasets: [
        {
          data: entries.map((entry) => entry.sales_by_percentage),
          backgroundColor: CATEGORY_COLORS,
          borderColor: '#ffffff',
          borderWidth: 3,
          hoverOffset: 6,
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
            label: (context) => `${context.label}: ${context.parsed}%`,
          },
        },
      },
    }
  }

  renderLegend(entries) {
    return (
      <ul className="sales-category-legend">
        {entries.map((entry, index) => (
          <li key={entry.Id}>
            <span
              className="sales-category-dot"
              style={{ backgroundColor: CATEGORY_COLORS[index % CATEGORY_COLORS.length] }}
            />
            <span className="sales-category-text">
              <strong>{entry.category_name}</strong>
              <span>
                {entry.sales_by_percentage}% ({MetricFormatter.currency(entry.total_sales_price)})
              </span>
            </span>
          </li>
        ))}
      </ul>
    )
  }

  renderContent() {
    if (this.state.loading) {
      return <div className="sales-category-status">Loading...</div>
    }

    if (this.state.error) {
      return <div className="sales-category-status">{this.state.error}</div>
    }

    const entries = this.entries()

    if (entries.length === 0) {
      return <div className="sales-category-status">No data found</div>
    }

    return (
      <div className="sales-category-content">
        <div className="sales-category-chart">
          <Chart type="doughnut" data={this.chartData(entries)} options={this.chartOptions()} />
        </div>
        {this.renderLegend(entries)}
      </div>
    )
  }

  render() {
    return (
      <section className="sales-category-card" aria-label="Sales by category chart">
        <header className="sales-category-header">
          <h2>Sales by Category</h2>
          <div className="sales-category-filters">
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

export default SalesByCategoryChart
