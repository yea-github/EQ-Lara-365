import ApiClient from '../ApiClient.js'
import CrmSummaryCard from '../../../domain/crm/CrmSummaryCard.js'

class CrmSummaryCardApiRepository {
  constructor(endpoint) {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}${endpoint}`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new CrmSummaryCard(row))
    } catch {
      throw new Error('CRM summary card data could not be loaded.')
    }
  }
}

export default CrmSummaryCardApiRepository
