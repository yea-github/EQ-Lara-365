<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmLeadOverTime extends Model
{
    protected $table = 'CRM_Leads_Over_Time';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'leads' => 'integer'];
}
