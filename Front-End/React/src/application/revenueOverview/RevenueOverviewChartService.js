import { REVENUE_CHART_MONTHS } from '../../domain/revenueOverview/RevenueReportingPeriod.js'

class RevenueOverviewChartService {
  constructor(repository) {
    this.repository = repository
  }

  async loadRevenueOverview() {
    return this.repository.all()
  }

  chartData(records, year) {
    const yearRecords = records.filter((record) => record.matchesYear(year))

    return {
      labels: REVENUE_CHART_MONTHS.map((month) => month.label),
      revenue: REVENUE_CHART_MONTHS.map((month) => this.valueForMonth(yearRecords, month.name, 'Revenue')),
      expenses: REVENUE_CHART_MONTHS.map((month) => this.valueForMonth(yearRecords, month.name, 'Expenses')),
    }
  }

  valueForMonth(records, month, field) {
    const record = records.find((item) => item.Month === month)

    return record ? record[field] : 0
  }
}

export default RevenueOverviewChartService
