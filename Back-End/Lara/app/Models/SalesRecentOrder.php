<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesRecentOrder extends Model
{
    protected $table = 'Sales_Recent_Orders';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'order_date' => 'date', 'amount' => 'integer'];
}
