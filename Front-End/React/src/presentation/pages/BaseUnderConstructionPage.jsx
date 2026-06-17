import React from 'react'

class BaseUnderConstructionPage extends React.Component {
  render() {
    return (
      <section className="page-view" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title">
          {this.props.title}
        </h1>
        <div className="page-center">
          <p className="under-construction">Under Construction</p>
        </div>
      </section>
    )
  }
}

export default BaseUnderConstructionPage
