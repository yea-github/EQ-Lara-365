<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmPipelineOverview extends Model
{
    protected $table = 'CRM_Pipeline_Overview';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'value' => 'integer', 'sort_order' => 'integer'];
}
