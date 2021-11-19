<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerCar extends Model
{
    use HasFactory;

    protected $table = 'owner_car';

    protected $fillable = ['name', 'email', 'picture', 'phone', 'address', 'acc_bank', 'bank', 'holder_name'];
}
