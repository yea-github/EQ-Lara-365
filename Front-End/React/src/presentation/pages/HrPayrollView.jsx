import React from 'react'
import EmployeeTable from '../components/employee/EmployeeTable.jsx'

class HrPayrollView extends React.Component {
  render() {
    return (
      <section className="page-view hr-payroll-page" aria-labelledby="page-title">
        <h1 id="page-title" className="page-title">
          HR & Payroll
        </h1>
        <div className="hr-payroll-primary-row">
          <EmployeeTable />
        </div>
      </section>
    )
  }
}

export default HrPayrollView
