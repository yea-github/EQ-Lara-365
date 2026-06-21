class AuthSession {
  constructor({ access_token, token_type, expires_in, user }) {
    this.accessToken = access_token
    this.tokenType = token_type || 'Bearer'
    this.expiresIn = Number(expires_in)
    this.user = user || null
  }

  authorizationHeader() {
    return `${this.tokenType} ${this.accessToken}`
  }

  isAuthenticated() {
    return Boolean(this.accessToken)
  }

  toJSON() {
    return {
      access_token: this.accessToken,
      token_type: this.tokenType,
      expires_in: this.expiresIn,
      user: this.user,
    }
  }
}

export default AuthSession
