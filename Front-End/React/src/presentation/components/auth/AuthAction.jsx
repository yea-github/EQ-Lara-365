import React from 'react'
import AuthSessionService from '../../../application/auth/AuthSessionService.js'
import LoginButton from './LoginButton.jsx'
import LogoutButton from './LogoutButton.jsx'

class AuthAction extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      authenticated: AuthSessionService.isAuthenticated(),
    }
    this.unsubscribe = null
  }

  componentDidMount() {
    this.unsubscribe = AuthSessionService.subscribe((session) => {
      this.setState({ authenticated: Boolean(session?.isAuthenticated()) })
    })
  }

  componentWillUnmount() {
    if (this.unsubscribe) {
      this.unsubscribe()
    }
  }

  render() {
    return (
      <div className="auth-action">
        {this.state.authenticated ? <LogoutButton /> : <LoginButton />}
      </div>
    )
  }
}

export default AuthAction
