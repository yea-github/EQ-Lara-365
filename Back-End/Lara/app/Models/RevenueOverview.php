<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueOverview extends Model
{
    protected $table = 'Revenue_Overview';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Year',
        'Month',
        'Revenue',
        'Expenses',
    ];

    protected $casts = [
        'Year' => 'integer',
        'Revenue' => 'float',
        'Expenses' => 'float',
    ];
}
