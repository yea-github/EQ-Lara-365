import RevenueOverview from '../../domain/revenueOverview/RevenueOverview.js'

class RevenueOverviewApiRepository {
  constructor() {
    this.endpoint = `${this.baseUrl()}/api/pub/get-revenue-overview`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    const response = await fetch(this.endpoint, {
      headers: {
        Accept: 'application/json',
      },
    })

    if (!response.ok) {
      throw new Error('Revenue overview data could not be loaded.')
    }

    const rows = await response.json()

    return rows.map((row) => new RevenueOverview(row))
  }
}

export default RevenueOverviewApiRepository
