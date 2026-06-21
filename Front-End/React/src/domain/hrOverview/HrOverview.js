class HrOverview {
  constructor({ Id, year, month, total_employees, new_joines, on_leave, open_positions }) {
    this.Id = Id
    this.year = Number(year)
    this.month = month
    this.total_employees = Number(total_employees)
    this.new_joines = Number(new_joines)
    this.on_leave = Number(on_leave)
    this.open_positions = Number(open_positions)
  }

  matchesPeriod(year, month) {
    return this.year === Number(year) && this.month === month
  }
}

export default HrOverview
