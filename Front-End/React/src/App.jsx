import React from 'react'
import './App.css'
import Home from './presentation/pages/Home.jsx'
import GlobalProgressSpinner from './presentation/components/loading/GlobalProgressSpinner.jsx'

class App extends React.Component {
  render() {
    return (
      <>
        <Home />
        <GlobalProgressSpinner />
      </>
    )
  }
}

export default App
