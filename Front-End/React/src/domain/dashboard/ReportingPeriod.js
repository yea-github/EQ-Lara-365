const FIRST_REPORTING_YEAR = 2020

export const REPORTING_YEARS = Array.from(
  { length: new Date().getFullYear() - FIRST_REPORTING_YEAR + 1 },
  (_, index) => String(FIRST_REPORTING_YEAR + index),
)

export const REPORTING_MONTHS = [
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

class ReportingPeriod {
  static defaultYear() {
    return String(new Date().getFullYear())
  }

  static defaultMonth() {
    const currentMonthIndex = new Date().getMonth()
    const previousMonthIndex = currentMonthIndex === 0 ? 11 : currentMonthIndex - 1

    return REPORTING_MONTHS[previousMonthIndex]
  }

  static previousMonth(year, month) {
    const monthIndex = REPORTING_MONTHS.indexOf(month)

    if (monthIndex > 0) {
      return { year, month: REPORTING_MONTHS[monthIndex - 1] }
    }

    return { year: String(Number(year) - 1), month: 'December' }
  }
}

export default ReportingPeriod
