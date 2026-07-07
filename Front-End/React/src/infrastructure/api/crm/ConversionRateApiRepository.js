import CrmSummaryCardApiRepository from './CrmSummaryCardApiRepository.js'

class ConversionRateApiRepository extends CrmSummaryCardApiRepository {
  constructor() {
    super('/api/pub/crm/conversion-rate')
  }
}

export default ConversionRateApiRepository
