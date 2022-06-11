<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['backpacker_id', 'arrival', 'check_in', 'check_out'];

    protected $table = 'records';
}