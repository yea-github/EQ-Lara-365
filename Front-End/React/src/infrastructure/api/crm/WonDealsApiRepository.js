import CrmSummaryCardApiRepository from './CrmSummaryCardApiRepository.js'

class WonDealsApiRepository extends CrmSummaryCardApiRepository {
  constructor() {
    super('/api/pub/crm/won-deals')
  }
}

export default WonDealsApiRepository
