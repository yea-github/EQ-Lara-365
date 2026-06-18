import React from 'react'
import { DASHBOARD_METRICS } from '../../../domain/dashboard/dashboardMetrics.js'
import BaseSummaryCard from './BaseSummaryCard.jsx'

class TotalRevenueCard extends React.Component {
  render() {
    return <BaseSummaryCard metric={DASHBOARD_METRICS.totalRevenue} {...this.props} />
  }
}

export default TotalRevenueCard
