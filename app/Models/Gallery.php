<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['place_id', 'car_id', 'picture'];

    protected $table = 'galleries';

    function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
