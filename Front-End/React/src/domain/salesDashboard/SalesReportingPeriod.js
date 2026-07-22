const FIRST_SALES_YEAR = 2020
const LAST_SALES_YEAR = 2026
const LAST_SALES_MONTH = 'June'

export const SALES_REPORTING_YEARS = Array.from(
  { length: LAST_SALES_YEAR - FIRST_SALES_YEAR + 1 },
  (_, index) => String(FIRST_SALES_YEAR + index),
)

export const SALES_REPORTING_MONTHS = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
]

class SalesReportingPeriod {
  static defaultYear() {
    return String(LAST_SALES_YEAR)
  }

  static defaultMonth() {
    return LAST_SALES_MONTH
  }

  static monthsForYear(year) {
    if (Number(year) === LAST_SALES_YEAR) {
      return SALES_REPORTING_MONTHS.slice(0, SALES_REPORTING_MONTHS.indexOf(LAST_SALES_MONTH) + 1)
    }

    return SALES_REPORTING_MONTHS
  }

  static normalizeMonth(year, month) {
    const months = this.monthsForYear(year)

    return months.includes(month) ? month : months[months.length - 1]
  }
}

export default SalesReportingPeriod
