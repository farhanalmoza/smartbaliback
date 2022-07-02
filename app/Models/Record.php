<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['backpacker_id', 'no_hp', 'arrival', 'check_in', 'check_out'];

    protected $table = 'records';
}