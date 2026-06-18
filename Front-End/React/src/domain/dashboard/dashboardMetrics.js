import DashboardMetric from './DashboardMetric.js'

export const DASHBOARD_METRICS = {
  totalRevenue: new DashboardMetric({
    id: 'total-revenue',
    title: 'Total Revenue',
    field: 'total_revenue',
    tone: 'blue',
    icon: 'bx-euro',
    format: 'currency',
  }),
  totalSalesOrders: new DashboardMetric({
    id: 'total-sales-orders',
    title: 'Total Sales Orders',
    field: 'total_sales_orders',
    tone: 'green',
    icon: 'bx-cart',
    format: 'number',
  }),
  totalPurchaseOrders: new DashboardMetric({
    id: 'total-purchase-orders',
    title: 'Total Purchase Orders',
    field: 'total_purchase_orders',
    tone: 'purple',
    icon: 'bx-shopping-bag',
    format: 'number',
  }),
  totalInventoryValue: new DashboardMetric({
    id: 'total-inventory-value',
    title: 'Total Inventory Value',
    field: 'total_inventory_value',
    tone: 'amber',
    icon: 'bx-package',
    format: 'currency',
  }),
  totalOutstanding: new DashboardMetric({
    id: 'total-outstanding',
    title: 'Total Outstanding',
    field: 'total_outstanding',
    tone: 'red',
    icon: 'bx-credit-card',
    format: 'currency',
  }),
}
