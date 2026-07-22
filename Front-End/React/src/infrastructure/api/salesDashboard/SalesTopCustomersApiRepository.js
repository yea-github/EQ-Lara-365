import SalesDashboardApiRepository from './SalesDashboardApiRepository.js'

class SalesTopCustomersApiRepository extends SalesDashboardApiRepository {
  constructor() {
    super('/api/pub/sales-dashboard/top-customers', 'Top customers data could not be loaded.')
  }
}

export default SalesTopCustomersApiRepository
