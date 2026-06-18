import React from 'react'
import { DASHBOARD_METRICS } from '../../../domain/dashboard/dashboardMetrics.js'
import BaseSummaryCard from './BaseSummaryCard.jsx'

class TotalSalesOrdersCard extends React.Component {
  render() {
    return <BaseSummaryCard metric={DASHBOARD_METRICS.totalSalesOrders} {...this.props} />
  }
}

export default TotalSalesOrdersCard
