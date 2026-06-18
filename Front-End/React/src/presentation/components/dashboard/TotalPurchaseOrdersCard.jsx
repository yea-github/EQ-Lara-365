import React from 'react'
import { DASHBOARD_METRICS } from '../../../domain/dashboard/dashboardMetrics.js'
import BaseSummaryCard from './BaseSummaryCard.jsx'

class TotalPurchaseOrdersCard extends React.Component {
  render() {
    return <BaseSummaryCard metric={DASHBOARD_METRICS.totalPurchaseOrders} {...this.props} />
  }
}

export default TotalPurchaseOrdersCard
