import React from 'react'
import { FilterMatchMode } from 'primereact/api'
import { Column } from 'primereact/column'
import { DataTable } from 'primereact/datatable'
import UsersRolesTableService from '../../../application/usersRoles/UsersRolesTableService.js'
import UsersRolesApiRepository from '../../../infrastructure/api/UsersRolesApiRepository.js'

const USERS_ROLES_FILTERS = {
  first_name: { value: null, matchMode: FilterMatchMode.CONTAINS },
  last_name: { value: null, matchMode: FilterMatchMode.CONTAINS },
  user_name: { value: null, matchMode: FilterMatchMode.CONTAINS },
  roles: { value: null, matchMode: FilterMatchMode.CONTAINS },
}

class UsersRolesTable extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new UsersRolesApiRepository()
    this.service = new UsersRolesTableService(this.repository)
    this.state = {
      records: [],
      filters: USERS_ROLES_FILTERS,
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadUsersRoles()
  }

  async loadUsersRoles() {
    try {
      const records = await this.service.loadUsersRoles()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  handleFilter = (event) => {
    this.setState({ filters: event.filters })
  }

  rows() {
    return this.service.rows(this.state.records)
  }

  renderContent() {
    if (this.state.error) {
      return <div className="employee-table-status">{this.state.error}</div>
    }

    return (
      <DataTable
        value={this.rows()}
        filters={this.state.filters}
        onFilter={this.handleFilter}
        filterDisplay="row"
        paginator
        rows={10}
        sortField="first_name"
        sortOrder={1}
        removableSort
        showGridlines
        responsiveLayout="scroll"
        emptyMessage="No users found"
        className="employee-prime-table"
      >
        <Column field="first_name" header="First Name" sortable filter filterPlaceholder="Search" />
        <Column field="last_name" header="Last Name" sortable filter filterPlaceholder="Search" />
        <Column field="user_name" header="User Name" sortable filter filterPlaceholder="Search" />
        <Column field="roles" header="Roles" sortable filter filterPlaceholder="Search" />
      </DataTable>
    )
  }

  render() {
    return (
      <section className="employee-table-card users-roles-table-card" aria-label="Users and roles table">
        <header className="employee-table-header">
          <h2>Users & Roles</h2>
        </header>
        {this.renderContent()}
      </section>
    )
  }
}

export default UsersRolesTable
