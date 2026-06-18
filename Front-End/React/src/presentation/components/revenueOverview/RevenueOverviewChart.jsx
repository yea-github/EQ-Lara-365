import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import RevenueOverviewChartService from '../../../application/revenueOverview/RevenueOverviewChartService.js'
import RevenueReportingPeriod, {
  REVENUE_CHART_YEARS,
} from '../../../domain/revenueOverview/RevenueReportingPeriod.js'
import RevenueOverviewApiRepository from '../../../infrastructure/api/RevenueOverviewApiRepository.js'

class RevenueOverviewChart extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new RevenueOverviewApiRepository()
    this.service = new RevenueOverviewChartService(this.repository)
    this.state = {
      records: [],
      selectedYear: RevenueReportingPeriod.defaultYear(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadRevenueOverview()
  }

  async loadRevenueOverview() {
    try {
      const records = await this.service.loadRevenueOverview()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  handleYearChange = (event) => {
    this.setState({ selectedYear: event.target.value })
  }

  chartData() {
    const chartData = this.service.chartData(this.state.records, this.state.selectedYear)

    return {
      labels: chartData.labels,
      datasets: [
        {
          label: 'Revenue (€)',
          data: chartData.revenue,
          borderColor: '#2f73ff',
          backgroundColor: 'rgba(47, 115, 255, 0.12)',
          borderWidth: 3,
          tension: 0.42,
          fill: true,
          pointRadius: 3,
          pointHoverRadius: 5,
        },
        {
          label: 'Expenses (€)',
          data: chartData.expenses,
          borderColor: '#27b35f',
          backgroundColor: 'rgba(39, 179, 95, 0.1)',
          borderWidth: 3,
          tension: 0.42,
          fill: true,
          pointRadius: 3,
          pointHoverRadius: 5,
        },
      ],
    }
  }

  chartOptions() {
    return {
      maintainAspectRatio: false,
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
          labels: {
            boxWidth: 12,
            boxHeight: 8,
            color: '#2a3853',
            usePointStyle: true,
            pointStyle: 'rectRounded',
          },
        },
        tooltip: {
          callbacks: {
            label: (context) => `${context.dataset.label}: ${context.parsed.y}M`,
          },
        },
      },
      scales: {
        x: {
          grid: {
            display: false,
          },
          ticks: {
            color: '#52627d',
          },
        },
        y: {
          min: 0,
          max: 10,
          ticks: {
            stepSize: 1,
            autoSkip: false,
            color: '#52627d',
            callback: (value) => (value === 0 ? '0' : `${value}M`),
          },
          grid: {
            color: '#e8edf5',
            borderDash: [4, 4],
          },
        },
      },
    }
  }

  renderContent() {
    if (this.state.loading) {
      return <div className="revenue-chart-status">Loading...</div>
    }

    if (this.state.error) {
      return <div className="revenue-chart-status">{this.state.error}</div>
    }

    return <Chart type="line" data={this.chartData()} options={this.chartOptions()} />
  }

  render() {
    return (
      <section className="revenue-overview-card" aria-label="Revenue overview chart">
        <header className="revenue-overview-header">
          <h2>Revenue Overview</h2>
          <label className="revenue-year-select">
            <span>Year</span>
            <select value={this.state.selectedYear} onChange={this.handleYearChange}>
              {REVENUE_CHART_YEARS.map((year) => (
                <option key={year} value={year}>
                  {year}
                </option>
              ))}
            </select>
          </label>
        </header>
        <div className="revenue-chart-body">{this.renderContent()}</div>
      </section>
    )
  }
}

export default RevenueOverviewChart
