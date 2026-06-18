import React from 'react'
import DashboardSummaryCardsRow from '../components/dashboard/DashboardSummaryCardsRow.jsx'

class DashboardView extends React.Component {
  render() {
    return (
      <section className="page-view dashboard-page" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title">
          Dashboard
        </h1>
        <DashboardSummaryCardsRow />
      </section>
    )
  }
}

export default DashboardView
