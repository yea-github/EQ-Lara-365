import React from 'react'
import { FilterMatchMode } from 'primereact/api'
import { Column } from 'primereact/column'
import { DataTable } from 'primereact/datatable'
import CrmRecentLeadsApiRepository from '../../../infrastructure/api/crmDashboard/CrmRecentLeadsApiRepository.js'
import BaseCrmPeriodWidget from './BaseCrmPeriodWidget.jsx'

const FILTERS = {
  name: { value: null, matchMode: FilterMatchMode.CONTAINS },
  company: { value: null, matchMode: FilterMatchMode.CONTAINS },
  source: { value: null, matchMode: FilterMatchMode.CONTAINS },
  status: { value: null, matchMode: FilterMatchMode.CONTAINS },
  date: { value: null, matchMode: FilterMatchMode.CONTAINS },
}

class CrmRecentLeadsTable extends React.Component {
  constructor(props) {
    super(props)
    this.state = { filters: FILTERS }
  }

  statusBody(row) {
    return <span className={`crm-status-pill crm-status-${row.status.toLowerCase().replaceAll(' ', '-')}`}>{row.status}</span>
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="crm-widget-status">Loading...</div>
    if (error) return <div className="crm-widget-status">{error}</div>

    return (
      <DataTable value={records} filters={this.state.filters} onFilter={(event) => this.setState({ filters: event.filters })} filterDisplay="row" paginator rows={5} removableSort sortField="date" sortOrder={-1} responsiveLayout="scroll" emptyMessage="No leads found" className="crm-prime-table">
        <Column field="name" header="Name" sortable filter filterPlaceholder="Search" />
        <Column field="company" header="Company" sortable filter filterPlaceholder="Search" />
        <Column field="source" header="Source" sortable filter filterPlaceholder="Search" />
        <Column field="status" header="Status" sortable filter filterPlaceholder="Search" body={this.statusBody} />
        <Column field="date" header="Date" sortable filter filterPlaceholder="Search" />
      </DataTable>
    )
  }

  render() {
    return (
      <BaseCrmPeriodWidget title="Recent Leads" repository={CrmRecentLeadsApiRepository} wide>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseCrmPeriodWidget>
    )
  }
}

export default CrmRecentLeadsTable
