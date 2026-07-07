import CrmDashboardApiRepository from './CrmDashboardApiRepository.js'

class CrmTopOpportunitiesApiRepository extends CrmDashboardApiRepository {
  constructor() {
    super('/api/pub/crm/top-opportunities', 'CRM top opportunities data could not be loaded.')
  }
}

export default CrmTopOpportunitiesApiRepository
