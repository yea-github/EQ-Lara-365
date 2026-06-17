<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectOverview extends Model
{
    protected $table = 'Project_Overview';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'year',
        'month',
        'in_progress',
        'completed',
        'on_hold',
        'not_started',
    ];

    protected $casts = [
        'year' => 'integer',
        'in_progress' => 'integer',
        'completed' => 'integer',
        'on_hold' => 'integer',
        'not_started' => 'integer',
    ];
}
