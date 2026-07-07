<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmLeadBySource extends Model
{
    protected $table = 'CRM_Leads_By_Source';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'percentage' => 'integer'];
}
