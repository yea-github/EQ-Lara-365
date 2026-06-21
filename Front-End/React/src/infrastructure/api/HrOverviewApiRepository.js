import ApiClient from './ApiClient.js'
import HrOverview from '../../domain/hrOverview/HrOverview.js'

class HrOverviewApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-hr-overview`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new HrOverview(row))
    } catch {
      throw new Error('HR overview data could not be loaded.')
    }
  }
}

export default HrOverviewApiRepository
