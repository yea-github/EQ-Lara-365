class ProjectOverview {
  constructor({ Id, year, month, in_progress, completed, on_hold, not_started }) {
    this.Id = Id
    this.year = Number(year)
    this.month = month
    this.in_progress = Number(in_progress)
    this.completed = Number(completed)
    this.on_hold = Number(on_hold)
    this.not_started = Number(not_started)
  }

  matchesPeriod(year, month) {
    return this.year === Number(year) && this.month === month
  }

  totalProjects() {
    return this.in_progress + this.completed + this.on_hold + this.not_started
  }
}

export default ProjectOverview
