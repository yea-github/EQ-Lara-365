class AuthService {
  constructor(repository, sessionService) {
    this.repository = repository
    this.sessionService = sessionService
  }

  async login(username, password) {
    const session = await this.repository.login(username, password)
    this.sessionService.save(session)

    return session
  }

  async logout() {
    try {
      if (this.sessionService.isAuthenticated()) {
        await this.repository.logout()
      }
    } finally {
      this.sessionService.clear()
    }
  }
}

export default AuthService
