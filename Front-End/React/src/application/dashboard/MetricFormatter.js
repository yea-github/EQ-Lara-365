class MetricFormatter {
  static number(value) {
    if (value === null || value === undefined) {
      return '-'
    }

    return new Intl.NumberFormat('en-IN').format(value)
  }

  static currency(value) {
    if (value === null || value === undefined) {
      return '-'
    }

    return `€ ${this.number(value)}`
  }

  static metric(value, format) {
    return format === 'currency' ? this.currency(value) : this.number(value)
  }

  static change(currentValue, previousValue) {
    if (!previousValue) {
      return null
    }

    return ((currentValue - previousValue) / previousValue) * 100
  }
}

export default MetricFormatter
