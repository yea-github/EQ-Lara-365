import ApiClient from './ApiClient.js'
import ProjectOverview from '../../domain/projectOverview/ProjectOverview.js'

class ProjectOverviewApiRepository {
  constructor() {
    this.client = new ApiClient()
    this.endpoint = `${this.baseUrl()}/api/pub/get-project-overview`
  }

  baseUrl() {
    return import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'
  }

  async all() {
    try {
      const rows = await this.client.getJson(this.endpoint)

      return rows.map((row) => new ProjectOverview(row))
    } catch {
      throw new Error('Project overview data could not be loaded.')
    }
  }
}

export default ProjectOverviewApiRepository
