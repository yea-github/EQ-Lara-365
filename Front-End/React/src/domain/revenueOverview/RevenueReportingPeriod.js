export const REVENUE_CHART_YEARS = ['2020', '2021', '2022', '2023', '2024', '2025']

export const REVENUE_CHART_MONTHS = [
  { name: 'January', label: 'Jan' },
  { name: 'February', label: 'Feb' },
  { name: 'March', label: 'Mar' },
  { name: 'April', label: 'Apr' },
  { name: 'May', label: 'May' },
  { name: 'June', label: 'Jun' },
  { name: 'July', label: 'Jul' },
  { name: 'August', label: 'Aug' },
  { name: 'September', label: 'Sep' },
  { name: 'October', label: 'Oct' },
  { name: 'November', label: 'Nov' },
  { name: 'December', label: 'Dec' },
]

class RevenueReportingPeriod {
  static defaultYear() {
    return '2025'
  }
}

export default RevenueReportingPeriod
