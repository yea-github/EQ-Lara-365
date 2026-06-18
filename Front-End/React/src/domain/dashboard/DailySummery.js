class DailySummery {
  constructor({
    Id,
    year,
    month,
    total_revenue,
    total_sales_orders,
    total_purchase_orders,
    total_inventory_value,
    total_outstanding,
  }) {
    this.Id = Id
    this.year = Number(year)
    this.month = month
    this.total_revenue = Number(total_revenue)
    this.total_sales_orders = Number(total_sales_orders)
    this.total_purchase_orders = Number(total_purchase_orders)
    this.total_inventory_value = Number(total_inventory_value)
    this.total_outstanding = Number(total_outstanding)
  }

  matches(year, month) {
    return this.year === Number(year) && this.month === month
  }
}

export default DailySummery
