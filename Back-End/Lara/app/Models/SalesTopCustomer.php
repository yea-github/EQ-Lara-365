<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesTopCustomer extends Model
{
    protected $table = 'Sales_Top_Customers';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'orders' => 'integer', 'total_sales' => 'integer', 'outstanding' => 'integer'];
}
