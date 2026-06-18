import SalesByCategory from '../../domain/salesByCategory/SalesByCategory.js'

class SalesByCategoryApiRepository {
  constructor() {
    this.endpoint = `${this.baseUrl()}/api/pub/sales-by-category`
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
      throw new Error('Sales by category data could not be loaded.')
    }

    const rows = await response.json()

    return rows.map((row) => new SalesByCategory(row))
  }
}

export default SalesByCategoryApiRepository
