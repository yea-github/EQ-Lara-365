const FIRST_CRM_YEAR = 2020
const LAST_CRM_YEAR = 2026
const LAST_CRM_MONTH = 'June'

export const CRM_REPORTING_YEARS = Array.from(
  { length: LAST_CRM_YEAR - FIRST_CRM_YEAR + 1 },
  (_, index) => String(FIRST_CRM_YEAR + index),
)

export const CRM_REPORTING_MONTHS = [
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

class CrmReportingPeriod {
  static defaultYear() {
    return String(LAST_CRM_YEAR)
  }

  static defaultMonth() {
    return LAST_CRM_MONTH
  }

  static monthsForYear(year) {
    if (Number(year) === LAST_CRM_YEAR) {
      return CRM_REPORTING_MONTHS.slice(0, CRM_REPORTING_MONTHS.indexOf(LAST_CRM_MONTH) + 1)
    }

    return CRM_REPORTING_MONTHS
  }

  static normalizeMonth(year, month) {
    const months = this.monthsForYear(year)

    return months.includes(month) ? month : months[months.length - 1]
  }
}

export default CrmReportingPeriod
