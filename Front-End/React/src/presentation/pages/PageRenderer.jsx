import React from 'react'
import { MENU_IDS } from '../../domain/navigation/menuEntries.js'
import AssetsView from './AssetsView.jsx'
import CrmView from './CrmView.jsx'
import DashboardView from './DashboardView.jsx'
import FinanceView from './FinanceView.jsx'
import HrPayrollView from './HrPayrollView.jsx'
import InventoryView from './InventoryView.jsx'
import ProductionView from './ProductionView.jsx'
import ProjectManagementView from './ProjectManagementView.jsx'
import PurchasesView from './PurchasesView.jsx'
import QualityManagementView from './QualityManagementView.jsx'
import ReportsAnalyticsView from './ReportsAnalyticsView.jsx'
import SalesView from './SalesView.jsx'
import SettingsView from './SettingsView.jsx'
import SystemView from './SystemView.jsx'
import UsersRolesView from './UsersRolesView.jsx'

class PageRenderer extends React.Component {
  render() {
    const pages = {
      [MENU_IDS.dashboard]: DashboardView,
      [MENU_IDS.usersRoles]: UsersRolesView,
      [MENU_IDS.crm]: CrmView,
      [MENU_IDS.sales]: SalesView,
      [MENU_IDS.purchases]: PurchasesView,
      [MENU_IDS.inventory]: InventoryView,
      [MENU_IDS.production]: ProductionView,
      [MENU_IDS.finance]: FinanceView,
      [MENU_IDS.hrPayroll]: HrPayrollView,
      [MENU_IDS.assets]: AssetsView,
      [MENU_IDS.projectManagement]: ProjectManagementView,
      [MENU_IDS.qualityManagement]: QualityManagementView,
      [MENU_IDS.reportsAnalytics]: ReportsAnalyticsView,
      [MENU_IDS.settings]: SettingsView,
      [MENU_IDS.system]: SystemView,
    }

    const ActivePage = pages[this.props.activeMenuId] || DashboardView

    return <ActivePage />
  }
}

export default PageRenderer
