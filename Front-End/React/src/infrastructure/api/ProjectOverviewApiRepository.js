import ProjectOverview from '../../domain/projectOverview/ProjectOverview.js'

class ProjectOverviewApiRepository {
  constructor() {
    this.endpoint = `${this.baseUrl()}/api/pub/get-project-overview`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    const response = await fetch(this.endpoint, {
      headers: {
        Accept: 'application/json',
      },
    })

    if (!response.ok) {
      throw new Error('Project overview data could not be loaded.')
    }

    const rows = await response.json()

    return rows.map((row) => new ProjectOverview(row))
  }
}

export default ProjectOverviewApiRepository
