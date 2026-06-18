class SalesByCategoryChartService {
  constructor(repository) {
    this.repository = repository
  }

  async loadSalesByCategory() {
    return this.repository.all()
  }

  entriesByPeriod(records, year, month) {
    return records
      .filter((record) => record.matchesPeriod(year, month))
      .sort((first, second) => second.sales_by_percentage - first.sales_by_percentage)
  }
}

export default SalesByCategoryChartService
