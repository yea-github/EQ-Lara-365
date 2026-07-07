import CrmDashboardApiRepository from './CrmDashboardApiRepository.js'

class CrmRecentLeadsApiRepository extends CrmDashboardApiRepository {
  constructor() {
    super('/api/pub/crm/recent-leads', 'CRM recent leads data could not be loaded.')
  }
}

export default CrmRecentLeadsApiRepository
