import React from 'react'
import DashboardSummaryCardsRow from '../components/dashboard/DashboardSummaryCardsRow.jsx'
import HrOverviewWidget from '../components/hrOverview/HrOverviewWidget.jsx'
import InventorySummeryTable from '../components/inventorySummery/InventorySummeryTable.jsx'
import ProjectOverviewChart from '../components/projectOverview/ProjectOverviewChart.jsx'
import RevenueOverviewChart from '../components/revenueOverview/RevenueOverviewChart.jsx'
import SalesByCategoryChart from '../components/salesByCategory/SalesByCategoryChart.jsx'

class DashboardView extends React.Component {
  render() {
    return (
      <section className="page-view dashboard-page" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title">
          Dashboard
        </h1>
        <DashboardSummaryCardsRow />
        <div className="dashboard-secondary-row">
          <RevenueOverviewChart />
          <SalesByCategoryChart />
        </div>
        <div className="dashboard-third-row">
          <ProjectOverviewChart />
          <InventorySummeryTable />
          <HrOverviewWidget />
        </div>
      </section>
    )
  }
}

export default DashboardView
