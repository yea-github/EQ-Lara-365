import React from 'react'
import NavigationService from '../../../application/navigation/NavigationService.js'
import { MENU_IDS } from '../../../domain/navigation/menuEntries.js'
import BaseMenuItem from './BaseMenuItem.jsx'

class SalesMenuItem extends React.Component {
  render() {
    const entry = NavigationService.findMenuEntry(MENU_IDS.sales)
    return <BaseMenuItem entry={entry} {...this.props} />
  }
}

export default SalesMenuItem
