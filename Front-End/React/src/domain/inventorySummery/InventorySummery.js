class InventorySummery {
  constructor({ Id, year, month, item_categorie, items, qty_in_hand, value }) {
    this.Id = Id
    this.year = Number(year)
    this.month = month
    this.item_categorie = item_categorie
    this.items = Number(items)
    this.qty_in_hand = Number(qty_in_hand)
    this.value = Number(value)
  }

  matchesPeriod(year, month) {
    return this.year === Number(year) && this.month === month
  }
}

export default InventorySummery
