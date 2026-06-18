import ReportingPeriod from '../../domain/dashboard/ReportingPeriod.js'

class DailySummeryDashboardService {
  constructor(repository) {
    this.repository = repository
  }

  async loadDailySummery() {
    return this.repository.all()
  }

  findByPeriod(records, year, month) {
    return records.find((record) => record.matches(year, month)) || null
  }

  previousValue(records, year, month, field) {
    const previousPeriod = ReportingPeriod.previousMonth(year, month)
    const previousRecord = this.findByPeriod(records, previousPeriod.year, previousPeriod.month)

    return previousRecord ? previousRecord[field] : null
  }
}

export default DailySummeryDashboardService
