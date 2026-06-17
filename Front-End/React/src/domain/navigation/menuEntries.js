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
  new MenuEntry({ id: MENU_IDS.dashboard, label: 'Dashboard', icon: 'H' }),
  new MenuEntry({ id: MENU_IDS.usersRoles, label: 'Users & Roles', icon: 'U' }),
  new MenuEntry({ id: MENU_IDS.crm, label: 'CRM', icon: 'C' }),
  new MenuEntry({ id: MENU_IDS.sales, label: 'Sales', icon: 'S' }),
  new MenuEntry({ id: MENU_IDS.purchases, label: 'Purchases', icon: 'P' }),
  new MenuEntry({ id: MENU_IDS.inventory, label: 'Inventory', icon: 'I' }),
  new MenuEntry({ id: MENU_IDS.production, label: 'Production', icon: 'M' }),
  new MenuEntry({ id: MENU_IDS.finance, label: 'Finance', icon: '$' }),
  new MenuEntry({ id: MENU_IDS.hrPayroll, label: 'HR & Payroll', icon: 'HR' }),
  new MenuEntry({ id: MENU_IDS.assets, label: 'Assets', icon: 'A' }),
  new MenuEntry({ id: MENU_IDS.projectManagement, label: 'Project Management', icon: 'PM' }),
  new MenuEntry({ id: MENU_IDS.qualityManagement, label: 'Quality Management', icon: 'Q' }),
  new MenuEntry({ id: MENU_IDS.reportsAnalytics, label: 'Reports & Analytics', icon: 'R' }),
  new MenuEntry({ id: MENU_IDS.settings, label: 'Settings', icon: '*' }),
  new MenuEntry({ id: MENU_IDS.system, label: 'System', icon: 'SY' }),
]
