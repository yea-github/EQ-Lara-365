import ApiClient from './ApiClient.js'
import SalesByCategory from '../../domain/salesByCategory/SalesByCategory.js'

class SalesByCategoryApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/sales-by-category`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new SalesByCategory(row))
    } catch {
      throw new Error('Sales by category data could not be loaded.')
    }
  }
}

export default SalesByCategoryApiRepository
