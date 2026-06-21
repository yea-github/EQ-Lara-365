import React from 'react'
import { FilterMatchMode } from 'primereact/api'
import { Column } from 'primereact/column'
import { DataTable } from 'primereact/datatable'
import EmployeeTableService from '../../../application/employee/EmployeeTableService.js'
import MetricFormatter from '../../../application/dashboard/MetricFormatter.js'
import EmployeeApiRepository from '../../../infrastructure/api/EmployeeApiRepository.js'

const EMPLOYEE_FILTERS = {
  first_name: { value: null, matchMode: FilterMatchMode.CONTAINS },
  last_name: { value: null, matchMode: FilterMatchMode.CONTAINS },
  date_of_birth: { value: null, matchMode: FilterMatchMode.CONTAINS },
  birth_place: { value: null, matchMode: FilterMatchMode.CONTAINS },
  salary_per_month: { value: null, matchMode: FilterMatchMode.CONTAINS },
  start_date: { value: null, matchMode: FilterMatchMode.CONTAINS },
  department: { value: null, matchMode: FilterMatchMode.CONTAINS },
  skills: { value: null, matchMode: FilterMatchMode.CONTAINS },
  remark: { value: null, matchMode: FilterMatchMode.CONTAINS },
}

class EmployeeTable extends React.Component {
  constructor(props) {
    super(props)
    this.repository = new EmployeeApiRepository()
    this.service = new EmployeeTableService(this.repository)
    this.state = {
      records: [],
      filters: EMPLOYEE_FILTERS,
      loading: true,
      error: '',
    }
  }

  componentDidMount() {
    this.loadEmployees()
  }

  async loadEmployees() {
    try {
      const records = await this.service.loadEmployees()
      this.setState({ records, loading: false, error: '' })
    } catch (error) {
      this.setState({ loading: false, error: error.message })
    }
  }

  handleFilter = (event) => {
    this.setState({ filters: event.filters })
  }

  salaryBody(row) {
    return `€ ${MetricFormatter.number(row.salary_per_month)}`
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
        loading={this.state.loading}
        filters={this.state.filters}
        onFilter={this.handleFilter}
        filterDisplay="row"
        paginator
        rows={5}
        sortField="first_name"
        sortOrder={1}
        removableSort
        showGridlines
        stripedRows
        responsiveLayout="scroll"
        emptyMessage="No employees found"
        className="employee-prime-table"
      >
        <Column field="first_name" header="First Name" sortable filter filterPlaceholder="Search" />
        <Column field="last_name" header="Last Name" sortable filter filterPlaceholder="Search" />
        <Column field="date_of_birth" header="Date of Birth" sortable filter filterPlaceholder="Search" />
        <Column field="birth_place" header="Birth Place" sortable filter filterPlaceholder="Search" />
        <Column
          field="salary_per_month"
          header="Salary / Month"
          sortable
          filter
          filterPlaceholder="Search"
          body={this.salaryBody}
        />
        <Column field="start_date" header="Start Date" sortable filter filterPlaceholder="Search" />
        <Column field="department" header="Department" sortable filter filterPlaceholder="Search" />
        <Column field="skills" header="Skills" sortable filter filterPlaceholder="Search" />
        <Column field="remark" header="Remark" sortable filter filterPlaceholder="Search" />
      </DataTable>
    )
  }

  render() {
    return (
      <section className="employee-table-card" aria-label="Employee table">
        <header className="employee-table-header">
          <h2>Employees</h2>
        </header>
        {this.renderContent()}
      </section>
    )
  }
}

export default EmployeeTable
