<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmTopOpportunity extends Model
{
    protected $table = 'CRM_Top_Opportunities';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['year' => 'integer', 'value' => 'integer', 'close_date' => 'date'];
}
