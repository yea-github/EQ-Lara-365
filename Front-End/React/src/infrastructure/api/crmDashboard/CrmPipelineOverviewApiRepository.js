import CrmDashboardApiRepository from './CrmDashboardApiRepository.js'

class CrmPipelineOverviewApiRepository extends CrmDashboardApiRepository {
  constructor() {
    super('/api/pub/crm/pipeline-overview', 'CRM pipeline overview data could not be loaded.')
  }
}

export default CrmPipelineOverviewApiRepository
