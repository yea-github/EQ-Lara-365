import ApiClient from './ApiClient.js'
import InventorySummery from '../../domain/inventorySummery/InventorySummery.js'

class InventorySummeryApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-inventory-summery`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new InventorySummery(row))
    } catch {
      throw new Error('Inventory summary data could not be loaded.')
    }
  }
}

export default InventorySummeryApiRepository
