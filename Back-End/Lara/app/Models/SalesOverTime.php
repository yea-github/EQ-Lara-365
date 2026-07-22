<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOverTime extends Model
{
    protected $table = 'Sales_Over_Time';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'sales_amount' => 'decimal:2'];
}
