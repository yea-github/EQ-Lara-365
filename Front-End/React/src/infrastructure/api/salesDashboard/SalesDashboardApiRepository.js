import ApiClient from '../ApiClient.js'
import SalesDashboardRecord from '../../../domain/salesDashboard/SalesDashboardRecord.js'

class SalesDashboardApiRepository {
  constructor(endpoint, errorMessage) {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}${endpoint}`
    this.errorMessage = errorMessage
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all(params = {}) {
    try {
      const rows = await this.client.getJson(this.endpointWithParams(params))

      return rows.map((row) => new SalesDashboardRecord(row))
    } catch {
      throw new Error(this.errorMessage)
    }
  }

  endpointWithParams(params) {
    const searchParams = new URLSearchParams()

    Object.entries(params).forEach(([key, value]) => {
      if (value !== undefined && value !== null && value !== '') {
        searchParams.set(key, value)
      }
    })

    const query = searchParams.toString()

    return query ? `${this.endpoint}?${query}` : this.endpoint
  }
}

export default SalesDashboardApiRepository
