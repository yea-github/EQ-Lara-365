import React from 'react'
import 'chart.js/auto'
import { Chart } from 'primereact/chart'
import CrmLeadsBySourceApiRepository from '../../../infrastructure/api/crmDashboard/CrmLeadsBySourceApiRepository.js'
import BaseCrmPeriodWidget from './BaseCrmPeriodWidget.jsx'

const SOURCE_COLORS = ['#2f73ff', '#29b995', '#f7b51b', '#8d5de8', '#9badc7']

class CrmLeadsBySourceChart extends React.Component {
  chartData(records) {
    return {
      labels: records.map((record) => record.source),
      datasets: [{
        data: records.map((record) => record.percentage),
        backgroundColor: SOURCE_COLORS,
        borderColor: '#ffffff',
        borderWidth: 4,
      }],
    }
  }

  renderLegend(records) {
    return (
      <ul className="crm-source-legend">
        {records.map((record, index) => (
          <li key={record.Id}>
            <span style={{ backgroundColor: SOURCE_COLORS[index % SOURCE_COLORS.length] }} />
            <strong>{record.source}</strong>
            <em>{record.percentage}%</em>
          </li>
        ))}
      </ul>
    )
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="crm-widget-status">Loading...</div>
    if (error) return <div className="crm-widget-status">{error}</div>
    if (records.length === 0) return <div className="crm-widget-status">No data found</div>

    return (
      <div className="crm-source-content">
        <div className="crm-donut-chart">
          <Chart type="doughnut" data={this.chartData(records)} options={{ maintainAspectRatio: false, cutout: '58%', plugins: { legend: { display: false } } }} />
        </div>
        {this.renderLegend(records)}
      </div>
    )
  }

  render() {
    return (
      <BaseCrmPeriodWidget title="Leads by Source" repository={CrmLeadsBySourceApiRepository}>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseCrmPeriodWidget>
    )
  }
}

export default CrmLeadsBySourceChart
