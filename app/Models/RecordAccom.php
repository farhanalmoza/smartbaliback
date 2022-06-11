<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordAccom extends Model
{
    use HasFactory;

    protected $fillable = ['record_id', 'accom_id'];

    protected $table = 'record_accom';
}