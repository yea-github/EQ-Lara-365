class EmployeeTableService {
  constructor(repository) {
    this.repository = repository
  }

  async loadEmployees() {
    return this.repository.all()
  }

  rows(records) {
    return [...records].sort((first, second) => first.first_name.localeCompare(second.first_name))
  }
}

export default EmployeeTableService
