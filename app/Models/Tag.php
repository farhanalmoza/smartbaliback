<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'tags';

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }

    public function tour()
    {
        return $this->belongsToMany(Tour::class, 'place_tag', 'place_id', 'tag_id');
    }

    public function hotel()
    {
        return $this->belongsToMany(hotel::class, 'hotel_tag', 'hotel_id', 'tag_id');
    }
}
