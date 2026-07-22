import React from 'react'
import SalesDashboardCategoryChart from '../components/salesDashboard/SalesDashboardCategoryChart.jsx'
import SalesOverTimeChart from '../components/salesDashboard/SalesOverTimeChart.jsx'
import SalesRecentOrdersTable from '../components/salesDashboard/SalesRecentOrdersTable.jsx'
import SalesSummaryCardsRow from '../components/salesDashboard/SalesSummaryCardsRow.jsx'
import SalesTopCustomersTable from '../components/salesDashboard/SalesTopCustomersTable.jsx'
import SalesTopProductsTable from '../components/salesDashboard/SalesTopProductsTable.jsx'

class SalesView extends React.Component {
  render() {
    return (
      <section className="page-view sales-page" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title sales-page-title">
          Sales Dashboard
        </h1>
        <SalesSummaryCardsRow />
        <div className="sales-analysis-row">
          <SalesOverTimeChart />
          <SalesDashboardCategoryChart />
          <SalesTopProductsTable />
        </div>
        <div className="sales-table-row">
          <SalesRecentOrdersTable />
          <SalesTopCustomersTable />
        </div>
      </section>
    )
  }
}

export default SalesView
