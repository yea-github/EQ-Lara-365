import SalesDashboardApiRepository from './SalesDashboardApiRepository.js'

class SalesTopProductsApiRepository extends SalesDashboardApiRepository {
  constructor() {
    super('/api/pub/sales-dashboard/top-products', 'Top selling products data could not be loaded.')
  }
}

export default SalesTopProductsApiRepository
