import React from 'react'
import { CRM_SUMMARY_METRICS } from '../../../domain/crm/crmSummaryMetrics.js'
import ConversionRateApiRepository from '../../../infrastructure/api/crm/ConversionRateApiRepository.js'
import OpportunitiesApiRepository from '../../../infrastructure/api/crm/OpportunitiesApiRepository.js'
import QualifiedLeadsApiRepository from '../../../infrastructure/api/crm/QualifiedLeadsApiRepository.js'
import TotalLeadsApiRepository from '../../../infrastructure/api/crm/TotalLeadsApiRepository.js'
import WonDealsApiRepository from '../../../infrastructure/api/crm/WonDealsApiRepository.js'
import CrmSummaryCard from './CrmSummaryCard.jsx'

class CrmSummaryCardsRow extends React.Component {
  constructor(props) {
    super(props)
    this.repositories = {
      totalLeads: new TotalLeadsApiRepository(),
      qualifiedLeads: new QualifiedLeadsApiRepository(),
      opportunities: new OpportunitiesApiRepository(),
      wonDeals: new WonDealsApiRepository(),
      conversionRate: new ConversionRateApiRepository(),
    }
    this.state = {
      records: {
        totalLeads: [],
        qualifiedLeads: [],
        opportunities: [],
        wonDeals: [],
        conversionRate: [],
      },
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadCards()
  }

  async loadCards() {
    try {
      const [
        totalLeads,
        qualifiedLeads,
        opportunities,
        wonDeals,
        conversionRate,
      ] = await Promise.all([
        this.repositories.totalLeads.all(),
        this.repositories.qualifiedLeads.all(),
        this.repositories.opportunities.all(),
        this.repositories.wonDeals.all(),
        this.repositories.conversionRate.all(),
      ])

      this.setState({
        loading: false,
        error: '',
        records: {
          totalLeads,
          qualifiedLeads,
          opportunities,
          wonDeals,
          conversionRate,
        },
      })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  renderCard(metric) {
    return (
      <CrmSummaryCard
        key={metric.key}
        metric={metric}
        records={this.state.records[metric.key]}
        loading={this.state.loading}
        error={this.state.error}
      />
    )
  }

  render() {
    return (
      <section className="crm-summary-row" aria-label="CRM summary cards">
        {Object.values(CRM_SUMMARY_METRICS).map((metric) => this.renderCard(metric))}
      </section>
    )
  }
}

export default CrmSummaryCardsRow
