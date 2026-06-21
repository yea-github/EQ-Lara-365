import AuthSession from '../../domain/auth/AuthSession.js'
import ApiClient from './ApiClient.js'

class AuthApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.loginEndpoint = `${this.baseUrl()}/api/login`
    this.logoutEndpoint = `${this.baseUrl()}/api/logout`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async login(username, password) {
    try {
      const response = await this.client.postJson(this.loginEndpoint, {
        username,
        password,
      })

      return new AuthSession(response)
    } catch {
      throw new Error('Login failed. Please check your user name and password.')
    }
  }

  async logout() {
    await this.client.postJson(this.logoutEndpoint, {})
  }
}

export default AuthApiRepository
