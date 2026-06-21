import ApiClient from './ApiClient.js'
import Employee from '../../domain/employee/Employee.js'

class EmployeeApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-all-employees`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new Employee(row))
    } catch {
      throw new Error('Employee data could not be loaded.')
    }
  }
}

export default EmployeeApiRepository
