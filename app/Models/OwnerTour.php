<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerTour extends Model
{
    use HasFactory;

    protected $table = 'owner_tour';

    protected $fillable = ['name', 'email', 'picture', 'phone', 'address', 'acc_bank', 'bank', 'holder_name'];
}
