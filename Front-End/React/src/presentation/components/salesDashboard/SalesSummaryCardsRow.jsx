import React from 'react'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import SalesDashboardPeriodService from '../../../application/salesDashboard/SalesDashboardPeriodService.js'
import SalesReportingPeriod from '../../../domain/salesDashboard/SalesReportingPeriod.js'
import SalesDashboardSummaryApiRepository from '../../../infrastructure/api/salesDashboard/SalesDashboardSummaryApiRepository.js'
import SalesPeriodFilters from './SalesPeriodFilters.jsx'

const SUMMARY_CARDS = [
  { key: 'total_sales', change: 'total_sales_change', title: 'Total Sales', tone: 'blue', icon: 'bx-euro', format: 'currency' },
  { key: 'total_orders', change: 'total_orders_change', title: 'Total Orders', tone: 'green', icon: 'bx-cart', format: 'number' },
  { key: 'average_order_value', change: 'average_order_value_change', title: 'Average Order Value', tone: 'purple', icon: 'bx-shopping-bag', format: 'currency' },
  { key: 'conversion_rate', change: 'conversion_rate_change', title: 'Conversion Rate', tone: 'orange', icon: 'bx-target-lock', format: 'percent' },
  { key: 'return_rate', change: 'return_rate_change', title: 'Return Rate', tone: 'red', icon: 'bx-credit-card', format: 'percent' },
]

class SalesSummaryCardsRow extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new SalesDashboardSummaryApiRepository()
    this.periodService = new SalesDashboardPeriodService()
    this.defaultPeriod = {
      year: SalesReportingPeriod.defaultYear(),
      month: SalesReportingPeriod.defaultMonth(),
    }
    this.state = {
      cardPeriods: this.initialCardPeriods(),
      records: [],
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadSummary()
  }

  initialCardPeriods() {
    return SUMMARY_CARDS.reduce((periods, card) => ({
      ...periods,
      [card.key]: this.defaultPeriod,
    }), {})
  }

  handlePeriodChange = (cardKey, year, month) => {
    this.setState((state) => ({
      cardPeriods: {
        ...state.cardPeriods,
        [cardKey]: { year, month },
      },
    }))
  }

  async loadSummary() {
    try {
      const records = await this.repository.all()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ records: [], loading: false, error: error.message })
    }
  }

  record(card) {
    const period = this.state.cardPeriods[card.key] || this.defaultPeriod

    return this.periodService.firstByPeriod(this.state.records, period.year, period.month)
  }

  displayValue(record, card) {
    if (!record) return '-'
    if (card.format === 'percent') return `${Number(record[card.key]).toFixed(1)}%`
    return card.format === 'currency' ? MetricFormatter.currency(record[card.key]) : MetricFormatter.number(record[card.key])
  }

  renderChange(record, card) {
    if (!record) return null
    const change = Number(record[card.change])
    const directionClass = change < 0 ? 'sales-summary-change-down' : 'sales-summary-change-up'
    const sign = change > 0 ? '+' : ''

    return <span className={`sales-summary-change ${directionClass}`}>{sign}{change.toFixed(1)}% <span>vs last month</span></span>
  }

  render() {
    return (
      <section className="sales-summary-row" aria-label="Sales summary cards">
        {SUMMARY_CARDS.map((card) => {
          const record = this.record(card)
          const period = this.state.cardPeriods[card.key] || this.defaultPeriod

          return (
            <article key={card.key} className={`sales-summary-card sales-summary-card-${card.tone}`}>
              <div className="sales-card-main">
                <div className="sales-summary-icon" aria-hidden="true"><i className={`bx ${card.icon}`} /></div>
                <div className="sales-summary-content">
                  <h2>{card.title}</h2>
                  <p>{this.state.loading ? 'Loading...' : this.displayValue(record, card)}</p>
                  {this.state.error ? (
                    <span className="sales-summary-change sales-summary-change-muted">{this.state.error}</span>
                  ) : (
                    !this.state.loading && this.state.records.length > 0 && this.renderChange(record, card)
                  )}
                </div>
              </div>
              <SalesPeriodFilters
                year={period.year}
                month={period.month}
                onChange={(year, month) => this.handlePeriodChange(card.key, year, month)}
                className="sales-summary-filters"
              />
            </article>
          )
        })}
      </section>
    )
  }
}

export default SalesSummaryCardsRow
