import SalesDashboardApiRepository from './SalesDashboardApiRepository.js'

class SalesDashboardSummaryApiRepository extends SalesDashboardApiRepository {
  constructor() {
    super('/api/pub/sales-dashboard/summary', 'Sales summary data could not be loaded.')
  }
}

export default SalesDashboardSummaryApiRepository
