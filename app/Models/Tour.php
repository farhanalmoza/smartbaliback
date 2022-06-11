<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'thumbnail', 'desc', 'address', 'latitude', 'longtitude', 'price', 'verified'];

    protected $table = 'tours';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'place_tag', 'place_id', 'tag_id')->withTimestamps();
    }

    function pictures()
    {
        return $this->hasMany(Gallery::class, 'place_id', 'id');
    }
}
