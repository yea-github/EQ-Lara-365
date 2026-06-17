<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventorySummery extends Model
{
    protected $table = 'Inventory_Summery';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'year',
        'month',
        'item_categorie',
        'items',
        'qty_in_hand',
        'value',
    ];

    protected $casts = [
        'year' => 'integer',
        'items' => 'integer',
        'qty_in_hand' => 'integer',
        'value' => 'integer',
    ];
}
