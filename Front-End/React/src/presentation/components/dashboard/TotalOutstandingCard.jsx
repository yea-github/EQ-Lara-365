import React from 'react'
import { DASHBOARD_METRICS } from '../../../domain/dashboard/dashboardMetrics.js'
import BaseSummaryCard from './BaseSummaryCard.jsx'

class TotalOutstandingCard extends React.Component {
  render() {
    return <BaseSummaryCard metric={DASHBOARD_METRICS.totalOutstanding} {...this.props} />
  }
}

export default TotalOutstandingCard
