import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import CrmLeadsOverTimeApiRepository from '../../../infrastructure/api/crmDashboard/CrmLeadsOverTimeApiRepository.js'
import BaseCrmPeriodWidget from './BaseCrmPeriodWidget.jsx'

class CrmLeadsOverTimeChart extends React.Component {
  chartData(records) {
    return {
      labels: records.map((record) => record.lead_month),
      datasets: [{
        data: records.map((record) => record.leads),
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

  chartOptions() {
    return {
      maintainAspectRatio: false,
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        x: { grid: { display: false }, ticks: { color: '#243452' } },
        y: {
          min: 0,
          max: 500,
          ticks: { stepSize: 100, color: '#243452' },
          grid: { color: '#e2e8f2' },
        },
      },
    }
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="crm-widget-status">Loading...</div>
    if (error) return <div className="crm-widget-status">{error}</div>
    if (records.length === 0) return <div className="crm-widget-status">No data found</div>

    return (
      <div className="crm-line-chart">
        <Chart type="line" data={this.chartData(records)} options={this.chartOptions()} />
      </div>
    )
  }

  render() {
    return (
      <BaseCrmPeriodWidget title="Leads Over Time" repository={CrmLeadsOverTimeApiRepository} wide>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseCrmPeriodWidget>
    )
  }
}

export default CrmLeadsOverTimeChart
