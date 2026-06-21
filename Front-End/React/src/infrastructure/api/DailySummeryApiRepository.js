import ApiClient from './ApiClient.js'
import DailySummery from '../../domain/dashboard/DailySummery.js'

class DailySummeryApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-daily-summery`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new DailySummery(row))
    } catch {
      throw new Error('Daily summary data could not be loaded.')
    }
  }
}

export default DailySummeryApiRepository
