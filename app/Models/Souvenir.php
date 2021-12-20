<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'thumbnail', 'desc', 'address', 'latitude', 'longtitude', 'verified'];

    protected $table = "souvenirs";

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'souvenir_tag', 'souvenir_id', 'tag_id')->withTimestamps();
    }

    function pictures()
    {
        return $this->hasMany(Gallery::class, 'souvenir_id', 'id');
    }
}
