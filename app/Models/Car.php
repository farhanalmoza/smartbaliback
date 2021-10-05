<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'no_car', 'name', 'status', 'year_production', 'rent_price', 'purchase_price', 'fuel_capacity', 'passenger_capacity', 'verified'];

    protected $table = 'cars';

    function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}
