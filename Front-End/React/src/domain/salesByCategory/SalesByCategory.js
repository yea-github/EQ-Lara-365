class SalesByCategory {
  constructor({
    Id,
    year,
    month,
    category_name,
    sales_by_percentage,
    total_sales_price,
  }) {
    this.Id = Id
    this.year = Number(year)
    this.month = month
    this.category_name = category_name
    this.sales_by_percentage = Number(sales_by_percentage)
    this.total_sales_price = Number(total_sales_price)
  }

  matchesPeriod(year, month) {
    return this.year === Number(year) && this.month === month
  }
}

export default SalesByCategory
