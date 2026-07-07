class CrmDashboardPeriodService {
  byPeriod(records, year, month) {
    return records.filter((record) => record.matches(year, month))
  }
}

export default CrmDashboardPeriodService
