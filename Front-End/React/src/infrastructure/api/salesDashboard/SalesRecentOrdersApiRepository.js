import SalesDashboardApiRepository from './SalesDashboardApiRepository.js'

class SalesRecentOrdersApiRepository extends SalesDashboardApiRepository {
  constructor() {
    super('/api/pub/sales-dashboard/recent-orders', 'Recent sales orders data could not be loaded.')
  }
}

export default SalesRecentOrdersApiRepository
