class UserRole {
  constructor({ Id, first_name, last_name, user_name, roles, privilege }) {
    this.Id = Id
    this.first_name = first_name
    this.last_name = last_name
    this.user_name = user_name
    this.roles = roles || privilege || '-'
  }
}

export default UserRole
