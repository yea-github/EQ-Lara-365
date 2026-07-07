import CrmDashboardApiRepository from './CrmDashboardApiRepository.js'

class CrmLeadsBySourceApiRepository extends CrmDashboardApiRepository {
  constructor() {
    super('/api/pub/crm/leads-by-source', 'CRM leads by source data could not be loaded.')
  }
}

export default CrmLeadsBySourceApiRepository
