<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailySummery extends Model
{
    protected $table = 'Daily_Summery';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'year',
        'month',
        'total_revenue',
        'total_sales_orders',
        'total_purchase_orders',
        'total_inventory_value',
        'total_outstanding',
    ];

    protected $casts = [
        'year' => 'integer',
        'total_revenue' => 'integer',
        'total_sales_orders' => 'integer',
        'total_purchase_orders' => 'integer',
        'total_inventory_value' => 'integer',
        'total_outstanding' => 'integer',
    ];
}
