<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordPlace extends Model
{
    use HasFactory;

    protected $fillable = ['record_id', 'place_id'];

    protected $table = 'record_place';
}