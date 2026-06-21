import HrOverview from '../../domain/hrOverview/HrOverview.js'

class HrOverviewApiRepository {
  constructor() {
    this.endpoint = `${this.baseUrl()}/api/pub/get-hr-overview`
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
      throw new Error('HR overview data could not be loaded.')
    }

    const rows = await response.json()

    return rows.map((row) => new HrOverview(row))
  }
}

export default HrOverviewApiRepository
