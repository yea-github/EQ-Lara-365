import React from 'react'
import ReportingPeriod from '../../../domain/dashboard/ReportingPeriod.js'
import DailySummeryApiRepository from '../../../infrastructure/api/DailySummeryApiRepository.js'
import DailySummeryDashboardService from '../../../application/dashboard/DailySummeryDashboardService.js'
import TotalInventoryValueCard from './TotalInventoryValueCard.jsx'
import TotalOutstandingCard from './TotalOutstandingCard.jsx'
import TotalPurchaseOrdersCard from './TotalPurchaseOrdersCard.jsx'
import TotalRevenueCard from './TotalRevenueCard.jsx'
import TotalSalesOrdersCard from './TotalSalesOrdersCard.jsx'

class DashboardSummaryCardsRow extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new DailySummeryApiRepository()
    this.service = new DailySummeryDashboardService(this.repository)
    this.state = {
      records: [],
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadDailySummery()
  }

  async loadDailySummery() {
    try {
      const records = await this.service.loadDailySummery()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({
        loading: false,
        error: error.message,
      })
    }
  }

  cardProps() {
    return {
      records: this.state.records,
      repository: this.repository,
      loading: this.state.loading,
      error: this.state.error,
      defaultYear: ReportingPeriod.defaultYear(),
      defaultMonth: ReportingPeriod.defaultMonth(),
    }
  }

  render() {
    const props = this.cardProps()

    return (
      <section className="dashboard-summary-row" aria-label="Daily summary cards">
        <TotalRevenueCard {...props} />
        <TotalSalesOrdersCard {...props} />
        <TotalPurchaseOrdersCard {...props} />
        <TotalInventoryValueCard {...props} />
        <TotalOutstandingCard {...props} />
      </section>
    )
  }
}

export default DashboardSummaryCardsRow
