import React from 'react'
import { FilterMatchMode } from 'primereact/api'
import { Column } from 'primereact/column'
import { DataTable } from 'primereact/datatable'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import SalesRecentOrdersApiRepository from '../../../infrastructure/api/salesDashboard/SalesRecentOrdersApiRepository.js'
import BaseSalesPeriodWidget from './BaseSalesPeriodWidget.jsx'

const FILTERS = {
  order_no: { value: null, matchMode: FilterMatchMode.CONTAINS },
  customer: { value: null, matchMode: FilterMatchMode.CONTAINS },
  date: { value: null, matchMode: FilterMatchMode.CONTAINS },
  amount: { value: null, matchMode: FilterMatchMode.CONTAINS },
  status: { value: null, matchMode: FilterMatchMode.CONTAINS },
}

class SalesRecentOrdersTable extends React.Component {
  constructor(props) {
    super(props)
    this.state = { filters: FILTERS }
  }

  amountBody(row) {
    return MetricFormatter.currency(row.amount)
  }

  statusBody(row) {
    return <span className={`sales-status-pill sales-status-${row.status.toLowerCase()}`}>{row.status}</span>
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="sales-widget-status">Loading...</div>
    if (error) return <div className="sales-widget-status">{error}</div>

    return (
      <DataTable value={records} filters={this.state.filters} onFilter={(event) => this.setState({ filters: event.filters })} filterDisplay="row" paginator rows={5} removableSort sortField="date" sortOrder={-1} responsiveLayout="scroll" emptyMessage="No sales orders found" className="sales-prime-table">
        <Column field="order_no" header="Order No." sortable filter filterPlaceholder="Search" />
        <Column field="customer" header="Customer" sortable filter filterPlaceholder="Search" />
        <Column field="date" header="Date" sortable filter filterPlaceholder="Search" />
        <Column field="amount" header="Amount" sortable filter filterPlaceholder="Search" body={this.amountBody} />
        <Column field="status" header="Status" sortable filter filterPlaceholder="Search" body={this.statusBody} />
      </DataTable>
    )
  }

  render() {
    return (
      <BaseSalesPeriodWidget title="Recent Sales Orders" repository={SalesRecentOrdersApiRepository} wide>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseSalesPeriodWidget>
    )
  }
}

export default SalesRecentOrdersTable
