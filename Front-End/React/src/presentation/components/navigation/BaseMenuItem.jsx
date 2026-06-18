import React from 'react'

class BaseMenuItem extends React.Component {
  handleClick = () => {
    this.props.onSelect(this.props.entry.id)
  }

  render() {
    const { entry, active } = this.props

    return (
      <button
        type="button"
        className={`nav-item ${active ? 'nav-item-active' : ''}`}
        onClick={this.handleClick}
        aria-current={active ? 'page' : undefined}
      >
        <span className="nav-item-icon" aria-hidden="true">
          <i className={`bx ${entry.icon}`} />
        </span>
        <span className="nav-item-label">{entry.label}</span>
      </button>
    )
  }
}

export default BaseMenuItem
