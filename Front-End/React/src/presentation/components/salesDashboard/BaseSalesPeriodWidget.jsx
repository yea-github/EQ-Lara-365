import React from 'react'
import SalesDashboardPeriodService from '../../../application/salesDashboard/SalesDashboardPeriodService.js'
import SalesReportingPeriod from '../../../domain/salesDashboard/SalesReportingPeriod.js'
import SalesPeriodFilters from './SalesPeriodFilters.jsx'

class BaseSalesPeriodWidget extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new props.repository()
    this.periodService = new SalesDashboardPeriodService()
    this.state = {
      records: [],
      year: SalesReportingPeriod.defaultYear(),
      month: SalesReportingPeriod.defaultMonth(),
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadRecords()
  }

  async loadRecords() {
    try {
      const records = await this.repository.all()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  handlePeriodChange = (year, month) => {
    this.setState({ year, month })
  }

  periodRecords() {
    return this.periodService.byPeriod(this.state.records, this.state.year, this.state.month)
  }

  render() {
    const { title, children, wide } = this.props

    return (
      <section className={`sales-widget-card ${wide ? 'sales-widget-card-wide' : ''}`}>
        <header className="sales-widget-header">
          <h2>{title}</h2>
          <SalesPeriodFilters year={this.state.year} month={this.state.month} onChange={this.handlePeriodChange} />
        </header>
        {children({ records: this.periodRecords(), loading: this.state.loading, error: this.state.error })}
      </section>
    )
  }
}

export default BaseSalesPeriodWidget
