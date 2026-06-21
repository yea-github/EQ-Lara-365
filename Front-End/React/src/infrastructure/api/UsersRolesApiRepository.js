import UserRole from '../../domain/usersRoles/UserRole.js'
import ApiClient from './ApiClient.js'

class UsersRolesApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-all-users-roles`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new UserRole(row))
    } catch {
      throw new Error('Users and roles data could not be loaded.')
    }
  }
}

export default UsersRolesApiRepository
