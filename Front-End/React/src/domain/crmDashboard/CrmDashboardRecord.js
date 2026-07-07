class CrmDashboardRecord {
  constructor(row) {
    Object.assign(this, row)
    this.year = Number(row.year)
  }

  matches(year, month) {
    return this.year === Number(year) && this.month === month
  }
}

export default CrmDashboardRecord
