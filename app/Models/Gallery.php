<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['place_id', 'car_id', 'hotel_id', 'worship_id', 'souvenir_id', 'picture'];

    protected $table = 'galleries';

    function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    function worship()
    {
        return $this->belongsTo(worship::class, 'worship_id', 'id');
    }

    function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    function souvenir()
    {
        return $this->belongsTo(Souvenir::class, 'souvenir_id', 'id');
    }
}
