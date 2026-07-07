class CrmSummaryCard {
  constructor({
    Id,
    metric_key,
    title,
    year,
    month,
    value,
    change_percent,
  }) {
    this.Id = Id
    this.metricKey = metric_key
    this.title = title
    this.year = Number(year)
    this.month = month
    this.value = Number(value)
    this.changePercent = Number(change_percent)
  }

  matches(year, month) {
    return this.year === Number(year) && this.month === month
  }
}

export default CrmSummaryCard
