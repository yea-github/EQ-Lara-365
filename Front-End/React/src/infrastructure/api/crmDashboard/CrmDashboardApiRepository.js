import ApiClient from '../ApiClient.js'
import CrmDashboardRecord from '../../../domain/crmDashboard/CrmDashboardRecord.js'

class CrmDashboardApiRepository {
  constructor(endpoint, errorMessage) {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}${endpoint}`
    this.errorMessage = errorMessage
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new CrmDashboardRecord(row))
    } catch {
      throw new Error(this.errorMessage)
    }
  }
}

export default CrmDashboardApiRepository
