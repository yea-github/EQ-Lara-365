class SalesDashboardPeriodService {
  byPeriod(records, year, month) {
    return records.filter((record) => (
      typeof record.matches === 'function'
        ? record.matches(year, month)
        : record.matchesPeriod(year, month)
    ))
  }

  firstByPeriod(records, year, month) {
    return this.byPeriod(records, year, month)[0] || null
  }
}

export default SalesDashboardPeriodService
