import SalesDashboardApiRepository from './SalesDashboardApiRepository.js'

class SalesOverTimeApiRepository extends SalesDashboardApiRepository {
  constructor() {
    super('/api/pub/sales-dashboard/sales-over-time', 'Sales over time data could not be loaded.')
  }
}

export default SalesOverTimeApiRepository
