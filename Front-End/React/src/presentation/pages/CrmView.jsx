import React from 'react'
import CrmLeadsBySourceChart from '../components/crm/CrmLeadsBySourceChart.jsx'
import CrmLeadsOverTimeChart from '../components/crm/CrmLeadsOverTimeChart.jsx'
import CrmPipelineOverview from '../components/crm/CrmPipelineOverview.jsx'
import CrmRecentLeadsTable from '../components/crm/CrmRecentLeadsTable.jsx'
import CrmSummaryCardsRow from '../components/crm/CrmSummaryCardsRow.jsx'
import CrmTopOpportunitiesTable from '../components/crm/CrmTopOpportunitiesTable.jsx'

class CrmView extends React.Component {
  render() {
    return (
      <section className="page-view crm-page" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title crm-page-title">
          CRM Dashboard
        </h1>
        <CrmSummaryCardsRow />
        <div className="crm-analysis-row">
          <CrmLeadsOverTimeChart />
          <CrmLeadsBySourceChart />
          <CrmPipelineOverview />
        </div>
        <div className="crm-table-row">
          <CrmRecentLeadsTable />
          <CrmTopOpportunitiesTable />
        </div>
      </section>
    )
  }
}

export default CrmView
