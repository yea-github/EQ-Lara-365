import React from 'react'
import CrmDashboardPeriodService from '../../../application/crmDashboard/CrmDashboardPeriodService.js'
import CrmReportingPeriod from '../../../domain/crm/CrmReportingPeriod.js'
import CrmPeriodFilters from './CrmPeriodFilters.jsx'

class BaseCrmPeriodWidget extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new props.repository()
    this.periodService = new CrmDashboardPeriodService()
    this.state = {
      records: [],
      year: CrmReportingPeriod.defaultYear(),
      month: CrmReportingPeriod.defaultMonth(),
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
      <section className={`crm-widget-card ${wide ? 'crm-widget-card-wide' : ''}`}>
        <header className="crm-widget-header">
          <h2>{title}</h2>
          <CrmPeriodFilters
            year={this.state.year}
            month={this.state.month}
            onChange={this.handlePeriodChange}
          />
        </header>
        {children({
          records: this.periodRecords(),
          loading: this.state.loading,
          error: this.state.error,
        })}
      </section>
    )
  }
}

export default BaseCrmPeriodWidget
