import CrmSummaryCardApiRepository from './CrmSummaryCardApiRepository.js'

class OpportunitiesApiRepository extends CrmSummaryCardApiRepository {
  constructor() {
    super('/api/pub/crm/opportunities')
  }
}

export default OpportunitiesApiRepository
