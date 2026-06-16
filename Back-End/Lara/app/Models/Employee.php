<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'Employee';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'birth_place',
        'salary_per_month',
        'start_date',
        'department',
        'skills',
        'remark',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'start_date' => 'date',
        'salary_per_month' => 'decimal:2',
    ];
}
