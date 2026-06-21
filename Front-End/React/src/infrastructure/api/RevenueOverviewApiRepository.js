import ApiClient from './ApiClient.js'
import RevenueOverview from '../../domain/revenueOverview/RevenueOverview.js'

class RevenueOverviewApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-revenue-overview`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new RevenueOverview(row))
    } catch {
      throw new Error('Revenue overview data could not be loaded.')
    }
  }
}

export default RevenueOverviewApiRepository
