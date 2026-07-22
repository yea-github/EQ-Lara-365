<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesDashboardSummary extends Model
{
    protected $table = 'Sales_Dashboard_Summary';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        'year' => 'integer',
        'total_sales' => 'integer',
        'total_orders' => 'integer',
        'average_order_value' => 'integer',
        'conversion_rate' => 'decimal:2',
        'return_rate' => 'decimal:2',
        'total_sales_change' => 'decimal:2',
        'total_orders_change' => 'decimal:2',
        'average_order_value_change' => 'decimal:2',
        'conversion_rate_change' => 'decimal:2',
        'return_rate_change' => 'decimal:2',
    ];
}
