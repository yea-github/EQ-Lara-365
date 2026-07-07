<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmRecentLead extends Model
{
    protected $table = 'CRM_Recent_Leads';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'lead_date' => 'date'];
}
