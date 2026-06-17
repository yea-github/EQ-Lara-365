import React from 'react'
import NavigationService from '../../../application/navigation/NavigationService.js'
import { MENU_IDS } from '../../../domain/navigation/menuEntries.js'
import BaseMenuItem from './BaseMenuItem.jsx'

class PurchasesMenuItem extends React.Component {
  render() {
    const entry = NavigationService.findMenuEntry(MENU_IDS.purchases)
    return <BaseMenuItem entry={entry} {...this.props} />
  }
}

export default PurchasesMenuItem
