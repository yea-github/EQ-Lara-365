import LoadingOverlayService from '../../application/loading/LoadingOverlayService.js'
import AuthSessionService from '../../application/auth/AuthSessionService.js'

class ApiClient {
  async getJson(endpoint) {
    return LoadingOverlayService.track(async () => {
      const requestEndpoint = this.endpointForSession(endpoint)
      let response = await fetch(requestEndpoint, this.requestOptions())

      if (!response.ok) {
        if (this.shouldRetryPublicEndpoint(response, requestEndpoint, endpoint)) {
          AuthSessionService.clear()
          response = await fetch(endpoint, this.requestOptions())
        } else {
          this.handleUnauthorized(response)
        }
      }

      if (!response.ok) {
        throw response
      }

      return response.json()
    })
  }

  async postJson(endpoint, body) {
    return LoadingOverlayService.track(async () => {
      const response = await fetch(endpoint, this.requestOptions('POST', body))

      if (!response.ok) {
        this.handleUnauthorized(response)
        throw response
      }

      return response.json()
    })
  }

  endpointForSession(endpoint) {
    if (!AuthSessionService.isAuthenticated()) {
      return endpoint
    }

    return endpoint.replace('/api/pub/', '/api/')
  }

  requestOptions(method = 'GET', body = null) {
    const headers = {
      Accept: 'application/json',
    }

    if (body) {
      headers['Content-Type'] = 'application/json'
    }

    if (AuthSessionService.isAuthenticated()) {
      headers.Authorization = AuthSessionService.authorizationHeader()
    }

    return {
      method,
      headers,
      body: body ? JSON.stringify(body) : null,
    }
  }

  handleUnauthorized(response) {
    if (response.status === 401 && AuthSessionService.isAuthenticated()) {
      AuthSessionService.clear()
    }
  }

  shouldRetryPublicEndpoint(response, requestEndpoint, originalEndpoint) {
    return response.status === 401
      && AuthSessionService.isAuthenticated()
      && requestEndpoint !== originalEndpoint
  }
}

export default ApiClient
