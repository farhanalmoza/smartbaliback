<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'thumbnail', 'desc', 'address', 'latitude', 'longtitude', 'verified_at'];

    protected $table = "hotels";

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'hotel_tag', 'hotel_id', 'tag_id')->withTimestamps();
    }

    function pictures()
    {
        return $this->hasMany(Gallery::class, 'place_id', 'id');
    }
}
