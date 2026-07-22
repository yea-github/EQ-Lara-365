<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesTopProduct extends Model
{
    protected $table = 'Sales_Top_Products';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'sales' => 'integer', 'revenue' => 'integer'];
}
