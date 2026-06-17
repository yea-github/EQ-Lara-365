<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'Sales';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'year',
        'month',
        'category_name',
        'sales_by_percentage',
        'total_sales_price',
    ];

    protected $casts = [
        'year' => 'integer',
        'sales_by_percentage' => 'integer',
        'total_sales_price' => 'integer',
    ];
}
