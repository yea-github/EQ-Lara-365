import React from 'react'
import { ProgressSpinner } from 'primereact/progressspinner'
import LoadingOverlayService from '../../../application/loading/LoadingOverlayService.js'

class GlobalProgressSpinner extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      loading: false,
    }
    this.unsubscribe = null
  }

  componentDidMount() {
    this.unsubscribe = LoadingOverlayService.subscribe((loading) => {
      this.setState({ loading })
    })
  }

  componentWillUnmount() {
    if (this.unsubscribe) {
      this.unsubscribe()
    }
  }

  render() {
    if (!this.state.loading) {
      return null
    }

    return (
      <div className="global-loading-overlay" role="status" aria-live="polite" aria-label="Loading">
        <ProgressSpinner
          strokeWidth="5"
          className="global-loading-spinner"
          animationDuration=".75s"
        />
      </div>
    )
  }
}

export default GlobalProgressSpinner
