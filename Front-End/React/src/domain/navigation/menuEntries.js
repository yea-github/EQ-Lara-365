import MenuEntry from './MenuEntry.js'

export const MENU_IDS = {
  dashboard: 'dashboard',
  usersRoles: 'users-roles',
  crm: 'crm',
  sales: 'sales',
  purchases: 'purchases',
  inventory: 'inventory',
  production: 'production',
  finance: 'finance',
  hrPayroll: 'hr-payroll',
  assets: 'assets',
  projectManagement: 'project-management',
  qualityManagement: 'quality-management',
  reportsAnalytics: 'reports-analytics',
  settings: 'settings',
  system: 'system',
}

export const MENU_ENTRIES = [
  new MenuEntry({ id: MENU_IDS.dashboard, label: 'Dashboard', icon: 'bx-home-alt' }),
  new MenuEntry({ id: MENU_IDS.usersRoles, label: 'Users & Roles', icon: 'bx-user-circle' }),
  new MenuEntry({ id: MENU_IDS.crm, label: 'CRM', icon: 'bx-group' }),
  new MenuEntry({ id: MENU_IDS.sales, label: 'Sales', icon: 'bx-cart' }),
  new MenuEntry({ id: MENU_IDS.purchases, label: 'Purchases', icon: 'bx-shopping-bag' }),
  new MenuEntry({ id: MENU_IDS.inventory, label: 'Inventory', icon: 'bx-package' }),
  new MenuEntry({ id: MENU_IDS.production, label: 'Production', icon: 'bx-cube' }),
  new MenuEntry({ id: MENU_IDS.finance, label: 'Finance', icon: 'bx-euro' }),
  new MenuEntry({ id: MENU_IDS.hrPayroll, label: 'HR & Payroll', icon: 'bx-user-check' }),
  new MenuEntry({ id: MENU_IDS.assets, label: 'Assets', icon: 'bx-briefcase-alt-2' }),
  new MenuEntry({ id: MENU_IDS.projectManagement, label: 'Project Management', icon: 'bx-calendar-check' }),
  new MenuEntry({ id: MENU_IDS.qualityManagement, label: 'Quality Management', icon: 'bx-shield-alt-2' }),
  new MenuEntry({ id: MENU_IDS.reportsAnalytics, label: 'Reports & Analytics', icon: 'bx-bar-chart-alt-2' }),
  new MenuEntry({ id: MENU_IDS.settings, label: 'Settings', icon: 'bx-cog' }),
  new MenuEntry({ id: MENU_IDS.system, label: 'System', icon: 'bx-buildings' }),
]
