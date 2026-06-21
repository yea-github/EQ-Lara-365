import React from 'react'
import UsersRolesTable from '../components/usersRoles/UsersRolesTable.jsx'

class UsersRolesView extends React.Component {
  render() {
    return (
      <section className="page-view users-roles-page" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title">
          Users & Roles
        </h1>
        <div className="users-roles-primary-row">
          <UsersRolesTable />
        </div>
      </section>
    )
  }
}

export default UsersRolesView
