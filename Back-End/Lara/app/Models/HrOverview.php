<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrOverview extends Model
{
    protected $table = 'HR_Overview';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'year',
        'month',
        'total_employees',
        'new_joines',
        'on_leave',
        'open_positions',
    ];

    protected $casts = [
        'year' => 'integer',
        'total_employees' => 'integer',
        'new_joines' => 'integer',
        'on_leave' => 'integer',
        'open_positions' => 'integer',
    ];
}
