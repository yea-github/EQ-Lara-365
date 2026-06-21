class Employee {
  constructor({
    Id,
    first_name,
    last_name,
    date_of_birth,
    birth_place,
    salary_per_month,
    start_date,
    department,
    skills,
    remark,
  }) {
    this.Id = Id
    this.first_name = first_name
    this.last_name = last_name
    this.full_name = `${first_name} ${last_name}`
    this.date_of_birth = date_of_birth
    this.birth_place = birth_place
    this.salary_per_month = Number(salary_per_month)
    this.start_date = start_date
    this.department = department
    this.skills = skills
    this.remark = remark || ''
  }
}

export default Employee
