import CrmSummaryCardApiRepository from './CrmSummaryCardApiRepository.js'

class QualifiedLeadsApiRepository extends CrmSummaryCardApiRepository {
  constructor() {
    super('/api/pub/crm/qualified-leads')
  }
}

export default QualifiedLeadsApiRepository
