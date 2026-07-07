import CrmSummaryCardApiRepository from './CrmSummaryCardApiRepository.js'

class TotalLeadsApiRepository extends CrmSummaryCardApiRepository {
  constructor() {
    super('/api/pub/crm/total-leads')
  }
}

export default TotalLeadsApiRepository
