import React from 'react'
import NavigationService from '../../../application/navigation/NavigationService.js'
import { MENU_IDS } from '../../../domain/navigation/menuEntries.js'
import BaseMenuItem from './BaseMenuItem.jsx'

class InventoryMenuItem extends React.Component {
  render() {
    const entry = NavigationService.findMenuEntry(MENU_IDS.inventory)
    return <BaseMenuItem entry={entry} {...this.props} />
  }
}

export default InventoryMenuItem
