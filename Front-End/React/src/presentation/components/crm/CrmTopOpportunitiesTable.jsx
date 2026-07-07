import React from 'react'
import { FilterMatchMode } from 'primereact/api'
import { Column } from 'primereact/column'
import { DataTable } from 'primereact/datatable'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import CrmTopOpportunitiesApiRepository from '../../../infrastructure/api/crmDashboard/CrmTopOpportunitiesApiRepository.js'
import BaseCrmPeriodWidget from './BaseCrmPeriodWidget.jsx'

const FILTERS = {
  opportunity: { value: null, matchMode: FilterMatchMode.CONTAINS },
  company: { value: null, matchMode: FilterMatchMode.CONTAINS },
  value: { value: null, matchMode: FilterMatchMode.CONTAINS },
  stage: { value: null, matchMode: FilterMatchMode.CONTAINS },
  close_date: { value: null, matchMode: FilterMatchMode.CONTAINS },
}

class CrmTopOpportunitiesTable extends React.Component {
  constructor(props) {
    super(props)
    this.state = { filters: FILTERS }
  }

  valueBody(row) {
    return MetricFormatter.currency(row.value)
  }

  stageBody(row) {
    return <span className={`crm-status-pill crm-stage-${row.stage.toLowerCase().replaceAll(' ', '-')}`}>{row.stage}</span>
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="crm-widget-status">Loading...</div>
    if (error) return <div className="crm-widget-status">{error}</div>

    return (
      <DataTable value={records} filters={this.state.filters} onFilter={(event) => this.setState({ filters: event.filters })} filterDisplay="row" paginator rows={5} removableSort sortField="value" sortOrder={-1} responsiveLayout="scroll" emptyMessage="No opportunities found" className="crm-prime-table">
        <Column field="opportunity" header="Opportunity" sortable filter filterPlaceholder="Search" />
        <Column field="company" header="Company" sortable filter filterPlaceholder="Search" />
        <Column field="value" header="Value" sortable filter filterPlaceholder="Search" body={this.valueBody} />
        <Column field="stage" header="Stage" sortable filter filterPlaceholder="Search" body={this.stageBody} />
        <Column field="close_date" header="Close Date" sortable filter filterPlaceholder="Search" />
      </DataTable>
    )
  }

  render() {
    return (
      <BaseCrmPeriodWidget title="Top Opportunities" repository={CrmTopOpportunitiesApiRepository} wide>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseCrmPeriodWidget>
    )
  }
}

export default CrmTopOpportunitiesTable
