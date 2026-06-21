import React from 'react'
import AuthService from '../../../application/auth/AuthService.js'
import AuthSessionService from '../../../application/auth/AuthSessionService.js'
import AuthApiRepository from '../../../infrastructure/api/AuthApiRepository.js'

class LogoutButton extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new AuthApiRepository()
    this.service = new AuthService(this.repository, AuthSessionService)
  }

  handleLogout = async () => {
    await this.service.logout()
  }

  render() {
    return (
      <button type="button" className="auth-top-button auth-logout-button" onClick={this.handleLogout}>
        <i className="bx bx-log-out" aria-hidden="true" />
        <span>Logout</span>
      </button>
    )
  }
}

export default LogoutButton
