import React from 'react'
import NavigationService from '../../application/navigation/NavigationService.js'
import { MENU_IDS } from '../../domain/navigation/menuEntries.js'
import AssetsMenuItem from '../components/navigation/AssetsMenuItem.jsx'
import CrmMenuItem from '../components/navigation/CrmMenuItem.jsx'
import DashboardMenuItem from '../components/navigation/DashboardMenuItem.jsx'
import FinanceMenuItem from '../components/navigation/FinanceMenuItem.jsx'
import HrPayrollMenuItem from '../components/navigation/HrPayrollMenuItem.jsx'
import InventoryMenuItem from '../components/navigation/InventoryMenuItem.jsx'
import ProductionMenuItem from '../components/navigation/ProductionMenuItem.jsx'
import ProjectManagementMenuItem from '../components/navigation/ProjectManagementMenuItem.jsx'
import PurchasesMenuItem from '../components/navigation/PurchasesMenuItem.jsx'
import QualityManagementMenuItem from '../components/navigation/QualityManagementMenuItem.jsx'
import ReportsAnalyticsMenuItem from '../components/navigation/ReportsAnalyticsMenuItem.jsx'
import SalesMenuItem from '../components/navigation/SalesMenuItem.jsx'
import SettingsMenuItem from '../components/navigation/SettingsMenuItem.jsx'
import SystemMenuItem from '../components/navigation/SystemMenuItem.jsx'
import UsersRolesMenuItem from '../components/navigation/UsersRolesMenuItem.jsx'
import AuthSessionService from '../../application/auth/AuthSessionService.js'
import AuthAction from '../components/auth/AuthAction.jsx'
import PageRenderer from './PageRenderer.jsx'

class Home extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      activeMenuId: NavigationService.defaultMenuId(),
      sidebarOpen: this.isDesktopViewport(),
      authRevision: 0,
    }
    this.unsubscribeAuth = null
    this.hasHandledInitialAuthState = false
  }

  componentDidMount() {
    this.unsubscribeAuth = AuthSessionService.subscribe(() => {
      if (!this.hasHandledInitialAuthState) {
        this.hasHandledInitialAuthState = true

        return
      }

      this.setState((state) => ({ authRevision: state.authRevision + 1 }))
    })
  }

  componentWillUnmount() {
    if (this.unsubscribeAuth) {
      this.unsubscribeAuth()
    }
  }

  isDesktopViewport() {
    return typeof window === 'undefined' || window.innerWidth > 720
  }

  handleSelectMenu = (menuId) => {
    this.setState({ activeMenuId: menuId, sidebarOpen: this.isDesktopViewport() })
  }

  handleToggleSidebar = () => {
    this.setState((state) => ({ sidebarOpen: !state.sidebarOpen }))
  }

  menuProps(menuId) {
    return {
      active: this.state.activeMenuId === menuId,
      onSelect: this.handleSelectMenu,
    }
  }

  render() {
    const shellClass = `erp-shell ${this.state.sidebarOpen ? 'sidebar-open' : 'sidebar-closed'}`

    return (
      <main className={shellClass}>
        <button
          type="button"
          className="burger-button"
          onClick={this.handleToggleSidebar}
          aria-label={this.state.sidebarOpen ? 'Close navigation menu' : 'Open navigation menu'}
          aria-expanded={this.state.sidebarOpen}
        >
          <span className="burger-line" aria-hidden="true" />
          <span className="burger-line" aria-hidden="true" />
          <span className="burger-line" aria-hidden="true" />
        </button>
        <button
          type="button"
          className="sidebar-backdrop"
          onClick={this.handleToggleSidebar}
          aria-label="Close navigation menu"
        />
        <aside className="sidebar" aria-label="Main navigation">
          <nav className="sidebar-nav">
            <DashboardMenuItem {...this.menuProps(MENU_IDS.dashboard)} />
            <UsersRolesMenuItem {...this.menuProps(MENU_IDS.usersRoles)} />
            <CrmMenuItem {...this.menuProps(MENU_IDS.crm)} />
            <SalesMenuItem {...this.menuProps(MENU_IDS.sales)} />
            <PurchasesMenuItem {...this.menuProps(MENU_IDS.purchases)} />
            <InventoryMenuItem {...this.menuProps(MENU_IDS.inventory)} />
            <ProductionMenuItem {...this.menuProps(MENU_IDS.production)} />
            <FinanceMenuItem {...this.menuProps(MENU_IDS.finance)} />
            <HrPayrollMenuItem {...this.menuProps(MENU_IDS.hrPayroll)} />
            <AssetsMenuItem {...this.menuProps(MENU_IDS.assets)} />
            <ProjectManagementMenuItem {...this.menuProps(MENU_IDS.projectManagement)} />
            <QualityManagementMenuItem {...this.menuProps(MENU_IDS.qualityManagement)} />
            <ReportsAnalyticsMenuItem {...this.menuProps(MENU_IDS.reportsAnalytics)} />
            <SettingsMenuItem {...this.menuProps(MENU_IDS.settings)} />
            <SystemMenuItem {...this.menuProps(MENU_IDS.system)} />
          </nav>
        </aside>
        <section className="content-panel">
          <AuthAction />
          <PageRenderer
            key={`${this.state.activeMenuId}-${this.state.authRevision}`}
            activeMenuId={this.state.activeMenuId}
          />
        </section>
      </main>
    )
  }
}

export default Home
