class UsersRolesTableService {
  constructor(repository) {
    this.repository = repository
  }

  async loadUsersRoles() {
    return this.repository.all()
  }

  rows(records) {
    return [...records].sort((first, second) => first.first_name.localeCompare(second.first_name))
  }
}

export default UsersRolesTableService
