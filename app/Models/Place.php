<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'desc', 'address', 'location', 'type'];

    protected $table = 'places';

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
