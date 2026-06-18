class RevenueOverview {
  constructor({ Id, Year, Month, Revenue, Expenses }) {
    this.Id = Id
    this.Year = Number(Year)
    this.Month = Month
    this.Revenue = Number(Revenue)
    this.Expenses = Number(Expenses)
  }

  matchesYear(year) {
    return this.Year === Number(year)
  }
}

export default RevenueOverview
