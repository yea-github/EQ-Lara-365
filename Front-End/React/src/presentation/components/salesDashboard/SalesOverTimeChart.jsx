import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import SalesOverTimeApiRepository from '../../../infrastructure/api/salesDashboard/SalesOverTimeApiRepository.js'
import BaseSalesPeriodWidget from './BaseSalesPeriodWidget.jsx'

class SalesOverTimeChart extends React.Component {
  chartData(records) {
    return {
      labels: records.map((record) => record.sales_month),
      datasets: [{
        label: 'Sales Amount (€)',
        data: records.map((record) => record.sales_amount),
        borderColor: '#2f73ff',
        backgroundColor: 'rgba(47, 115, 255, 0.12)',
        borderWidth: 4,
        tension: 0.42,
        fill: true,
        pointRadius: 5,
        pointBackgroundColor: '#2f73ff',
      }],
    }
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="sales-widget-status">Loading...</div>
    if (error) return <div className="sales-widget-status">{error}</div>
    if (records.length === 0) return <div className="sales-widget-status">No data found</div>

    return (
      <div className="sales-line-chart">
        <Chart
          type="line"
          data={this.chartData(records)}
          options={{
            maintainAspectRatio: false,
            responsive: true,
            plugins: { legend: { position: 'bottom', labels: { color: '#1d2a42', usePointStyle: true } } },
            scales: {
              x: { grid: { display: false }, ticks: { color: '#243452' } },
              y: { min: 0, max: 12, ticks: { stepSize: 2, color: '#243452', callback: (value) => (value === 0 ? '0' : `${value}M`) }, grid: { color: '#e2e8f2' } },
            },
          }}
        />
      </div>
    )
  }

  render() {
    return (
      <BaseSalesPeriodWidget title="Sales Over Time" repository={SalesOverTimeApiRepository} wide>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseSalesPeriodWidget>
    )
  }
}

export default SalesOverTimeChart
