<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'phone',
        'designation',
        'kpi_score',
        'status',
    ];

    protected $casts = [
        'kpi_score' => 'integer',
        'status' => 'boolean',
    ];
}
