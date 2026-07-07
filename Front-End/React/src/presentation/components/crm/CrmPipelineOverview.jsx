import React from 'react'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import CrmPipelineOverviewApiRepository from '../../../infrastructure/api/crmDashboard/CrmPipelineOverviewApiRepository.js'
import BaseCrmPeriodWidget from './BaseCrmPeriodWidget.jsx'

const PIPELINE_COLORS = ['#2f73ff', '#29b995', '#f7b51b', '#8d5de8', '#ef3e46']

class CrmPipelineOverview extends React.Component {
  renderContent(records, loading, error) {
    if (loading) return <div className="crm-widget-status">Loading...</div>
    if (error) return <div className="crm-widget-status">{error}</div>
    if (records.length === 0) return <div className="crm-widget-status">No data found</div>

    return (
      <div className="crm-pipeline-content">
        <div className="crm-funnel" aria-hidden="true">
          {records.map((record, index) => (
            <span
              key={record.Id}
              style={{
                backgroundColor: PIPELINE_COLORS[index % PIPELINE_COLORS.length],
                width: `${100 - (index * 16)}%`,
              }}
            />
          ))}
        </div>
        <ul className="crm-pipeline-labels">
          {records.map((record) => (
            <li key={record.Id}>
              <span />
              <strong>{record.stage} ({MetricFormatter.number(record.value)})</strong>
            </li>
          ))}
        </ul>
      </div>
    )
  }

  render() {
    return (
      <BaseCrmPeriodWidget title="Pipeline Overview" repository={CrmPipelineOverviewApiRepository}>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseCrmPeriodWidget>
    )
  }
}

export default CrmPipelineOverview
