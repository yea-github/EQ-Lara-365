import React from 'react'
import AuthService from '../../../application/auth/AuthService.js'
import AuthSessionService from '../../../application/auth/AuthSessionService.js'
import AuthApiRepository from '../../../infrastructure/api/AuthApiRepository.js'

class LoginButton extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new AuthApiRepository()
    this.service = new AuthService(this.repository, AuthSessionService)
    this.state = {
      dialogOpen: false,
      username: '',
      password: '',
      error: '',
    }
  }

  openDialog = () => {
    this.setState({ dialogOpen: true, error: '' })
  }

  closeDialog = () => {
    this.setState({ dialogOpen: false, password: '', error: '' })
  }

  handleUsernameChange = (event) => {
    this.setState({ username: event.target.value })
  }

  handlePasswordChange = (event) => {
    this.setState({ password: event.target.value })
  }

  handleSubmit = async (event) => {
    event.preventDefault()

    try {
      await this.service.login(this.state.username, this.state.password)
      this.setState({ dialogOpen: false, password: '', error: '' })
    } catch (error) {
      this.setState({ error: error.message })
    }
  }

  renderDialog() {
    if (!this.state.dialogOpen) {
      return null
    }

    return (
      <div className="auth-dialog-backdrop" role="presentation">
        <section className="auth-dialog" role="dialog" aria-modal="true" aria-labelledby="login-title">
          <header className="auth-dialog-header">
            <h2 id="login-title">Login</h2>
            <button type="button" className="auth-dialog-close" onClick={this.closeDialog} aria-label="Close login">
              <i className="bx bx-x" aria-hidden="true" />
            </button>
          </header>
          <form className="auth-dialog-form" onSubmit={this.handleSubmit}>
            <label>
              <span>User Name</span>
              <input
                type="text"
                value={this.state.username}
                onChange={this.handleUsernameChange}
                autoComplete="username"
                required
              />
            </label>
            <label>
              <span>Password</span>
              <input
                type="password"
                value={this.state.password}
                onChange={this.handlePasswordChange}
                autoComplete="current-password"
                required
              />
            </label>
            {this.state.error ? <p className="auth-dialog-error">{this.state.error}</p> : null}
            <div className="auth-dialog-actions">
              <button type="button" className="auth-secondary-button" onClick={this.closeDialog}>
                Cancel
              </button>
              <button type="submit" className="auth-primary-button">
                Login
              </button>
            </div>
          </form>
        </section>
      </div>
    )
  }

  render() {
    return (
      <>
        <button type="button" className="auth-top-button auth-login-button" onClick={this.openDialog}>
          <i className="bx bx-log-in" aria-hidden="true" />
          <span>Login</span>
        </button>
        {this.renderDialog()}
      </>
    )
  }
}

export default LoginButton
