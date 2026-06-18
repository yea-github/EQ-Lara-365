import DailySummery from '../../domain/dashboard/DailySummery.js'

class DailySummeryApiRepository {
  constructor() {
    this.endpoint = `${this.baseUrl()}/api/pub/get-daily-summery`
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
      throw new Error('Daily summary data could not be loaded.')
    }

    const rows = await response.json()

    return rows.map((row) => new DailySummery(row))
  }
}

export default DailySummeryApiRepository
