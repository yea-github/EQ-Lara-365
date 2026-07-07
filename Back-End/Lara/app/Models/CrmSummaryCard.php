<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmSummaryCard extends Model
{
    protected $table = 'CRM_Summary_Cards';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'metric_key',
        'title',
        'year',
        'month',
        'value',
        'change_percent',
    ];

    protected $casts = [
        'year' => 'integer',
        'value' => 'decimal:2',
        'change_percent' => 'decimal:2',
    ];
}
