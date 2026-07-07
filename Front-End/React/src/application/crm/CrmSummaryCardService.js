import MetricFormatter from '../dashboard/MetricFormatter.js'

class CrmSummaryCardService {
  findByPeriod(records, year, month) {
    return records.find((record) => record.matches(year, month)) || null
  }

  displayValue(record, metric) {
    if (!record) {
      return '-'
    }

    if (metric.format === 'percent') {
      return `${record.value.toFixed(1)}%`
    }

    return MetricFormatter.number(record.value)
  }
}

export default CrmSummaryCardService
