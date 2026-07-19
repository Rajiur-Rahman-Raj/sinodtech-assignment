<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function latestSale()
    {
        return $this->hasOne(Sale::class)
            ->latestOfMany('sale_date');
    }

    public function assignment()
    {
        return $this->hasOne(CustomerAssignment::class);
    }
}
