<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backpacker extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'phone', 'arrived_date', 'departure_date', 'arrived_place', 'accomodation', 'hotel', 'tourist_attraction'];

    protected $table = 'backpackers';
}
