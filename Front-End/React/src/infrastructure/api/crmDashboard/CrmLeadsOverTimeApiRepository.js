import CrmDashboardApiRepository from './CrmDashboardApiRepository.js'

class CrmLeadsOverTimeApiRepository extends CrmDashboardApiRepository {
  constructor() {
    super('/api/pub/crm/leads-over-time', 'CRM leads over time data could not be loaded.')
  }
}

export default CrmLeadsOverTimeApiRepository
