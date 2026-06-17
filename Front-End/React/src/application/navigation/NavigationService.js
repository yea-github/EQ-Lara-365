import { MENU_ENTRIES, MENU_IDS } from '../../domain/navigation/menuEntries.js'

class NavigationService {
  static defaultMenuId() {
    return MENU_IDS.dashboard
  }

  static allMenuEntries() {
    return MENU_ENTRIES
  }

  static findMenuEntry(menuId) {
    return MENU_ENTRIES.find((menuEntry) => menuEntry.id === menuId)
  }
}

export default NavigationService
