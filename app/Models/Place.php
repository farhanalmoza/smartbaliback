<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'thumbnail', 'desc', 'address', 'latitude', 'longtitude', 'type'];

    protected $table = 'places';

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    function pictures()
    {
        return $this->hasMany(Gallery::class, 'place_id', 'id');
    }
}
