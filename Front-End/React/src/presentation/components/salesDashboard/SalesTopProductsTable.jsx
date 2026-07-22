import React from 'react'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import SalesTopProductsApiRepository from '../../../infrastructure/api/salesDashboard/SalesTopProductsApiRepository.js'
import BaseSalesPeriodWidget from './BaseSalesPeriodWidget.jsx'

class SalesTopProductsTable extends React.Component {
  renderContent(records, loading, error) {
    if (loading) return <div className="sales-widget-status">Loading...</div>
    if (error) return <div className="sales-widget-status">{error}</div>

    return (
      <div className="sales-simple-table-wrap">
        <table className="sales-simple-table">
          <thead><tr><th>Product</th><th>Sales</th><th>Revenue</th></tr></thead>
          <tbody>{records.slice(0, 5).map((record) => <tr key={record.Id}><td>{record.product}</td><td>{MetricFormatter.number(record.sales)}</td><td>{MetricFormatter.currency(record.revenue)}</td></tr>)}</tbody>
        </table>
      </div>
    )
  }

  render() {
    return (
      <BaseSalesPeriodWidget title="Top Selling Products" repository={SalesTopProductsApiRepository}>
        {({ records, loading, error }) => this.renderContent(records, loading, error)}
      </BaseSalesPeriodWidget>
    )
  }
}

export default SalesTopProductsTable
