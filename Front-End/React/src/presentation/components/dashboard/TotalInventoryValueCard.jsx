import React from 'react'
import { DASHBOARD_METRICS } from '../../../domain/dashboard/dashboardMetrics.js'
import BaseSummaryCard from './BaseSummaryCard.jsx'

class TotalInventoryValueCard extends React.Component {
  render() {
    return <BaseSummaryCard metric={DASHBOARD_METRICS.totalInventoryValue} {...this.props} />
  }
}

export default TotalInventoryValueCard
