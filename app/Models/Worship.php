<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'thumbnail', 'desc', 'address', 'latitude', 'longtitude', 'verified'];

    protected $table = "worships";

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'worship_tag', 'worship_id', 'tag_id')->withTimestamps();
    }

    function pictures()
    {
        return $this->hasMany(Gallery::class, 'worship_id', 'id');
    }
}
