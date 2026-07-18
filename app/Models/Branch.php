<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'code',
        'address',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
