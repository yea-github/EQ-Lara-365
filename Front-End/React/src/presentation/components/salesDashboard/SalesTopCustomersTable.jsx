import React from 'react'
import { FilterMatchMode } from 'primereact/api'
import { Column } from 'primereact/column'
import { DataTable } from 'primereact/datatable'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import SalesTopCustomersApiRepository from '../../../infrastructure/api/salesDashboard/SalesTopCustomersApiRepository.js'
import BaseSalesPeriodWidget from './BaseSalesPeriodWidget.jsx'

const FILTERS = {
  customer: { value: null, matchMode: FilterMatchMode.CONTAINS },
  orders: { value: null, matchMode: FilterMatchMode.CONTAINS },
  total_sales: { value: null, matchMode: FilterMatchMode.CONTAINS },
  outstanding: { value: null, matchMode: FilterMatchMode.CONTAINS },
}

class SalesTopCustomersTable extends React.Component {
  constructor(props) {
    super(props)
    this.state = { filters: FILTERS }
  }

  totalSalesBody(row) {
    return MetricFormatter.currency(row.total_sales)
  }

  outstandingBody(row) {
    return MetricFormatter.currency(row.outstanding)
  }

  renderContent(records, loading, error) {
    if (loading) return <div className="sales-widget-status">Loading...</div>
    if (error) return <div className="sales-widget-status">{error}</div>

    return (
      <DataTable value={records} filters={this.state.filters} onFilter={(event) => this.setState({ filters: event.filters })} filterDisplay="row" paginator rows={5} removableSort sortField="total_sales" sortOrder={-1} responsiveLayout="scroll" emptyMessage="No customers found" className="sales-prime-table">
        <Column field="customer" header="Customer" sortable filter filterPlaceholder="Search" />
        <Column field="orders" header="Orders" sortable filter filterPlaceholder="Search" />
        <Column field="total_sales" header="Total Sales" sortable filter filterPlaceholder="Search" body={this.totalSalesBody} />
        <Column field="outstanding" header="Outstanding" sortable filter filterPlaceholder="Search" body={this.outstandingBody} />
      </DataTable>
    )
  }

  render() {
    return (
      <BaseSalesPeriodWidget title="Top Customers" repository={SalesTopCustomersApiRepository} wide>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseSalesPeriodWidget>
    )
  }
}

export default SalesTopCustomersTable
