<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerWorship extends Model
{
    use HasFactory;

    protected $table = 'owner_worship';

    protected $fillable = ['name', 'email', 'picture', 'phone', 'address', 'acc_bank', 'bank', 'holder_name'];
}
