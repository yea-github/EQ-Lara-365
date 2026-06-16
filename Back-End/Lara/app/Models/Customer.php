<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'Customers';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'customer_name',
        'sales',
        'orders',
    ];

    protected $casts = [
        'sales' => 'decimal:2',
        'orders' => 'integer',
    ];
}
