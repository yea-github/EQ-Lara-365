class InventorySummeryTableService {
  constructor(repository) {
    this.repository = repository
  }

  async loadInventorySummery() {
    return this.repository.all()
  }

  entriesByPeriod(records, year, month) {
    return records
      .filter((record) => record.matchesPeriod(year, month))
      .sort((first, second) => first.item_categorie.localeCompare(second.item_categorie))
  }
}

export default InventorySummeryTableService
