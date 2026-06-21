import AuthSession from '../../domain/auth/AuthSession.js'

const SESSION_STORAGE_KEY = 'eq_lara_auth_session'

class AuthSessionService {
  constructor() {
    this.session = this.restoreSession()
    this.listeners = new Set()
  }

  restoreSession() {
    try {
      const storedSession = window.localStorage.getItem(SESSION_STORAGE_KEY)

      return storedSession ? new AuthSession(JSON.parse(storedSession)) : null
    } catch {
      return null
    }
  }

  currentSession() {
    return this.session
  }

  isAuthenticated() {
    return Boolean(this.session?.isAuthenticated())
  }

  authorizationHeader() {
    return this.session?.authorizationHeader() || ''
  }

  save(session) {
    this.session = session
    window.localStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(session.toJSON()))
    this.emit()
  }

  clear() {
    this.session = null
    window.localStorage.removeItem(SESSION_STORAGE_KEY)
    this.emit()
  }

  subscribe(listener) {
    this.listeners.add(listener)
    listener(this.session)

    return () => {
      this.listeners.delete(listener)
    }
  }

  emit() {
    this.listeners.forEach((listener) => listener(this.session))
  }
}

export default new AuthSessionService()
