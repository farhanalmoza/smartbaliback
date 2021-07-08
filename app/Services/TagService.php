<?php
namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function add($data)
    {
        $create = Tag::create($data);
        if(!$create) return response(['message' => 'Tag gagal ditambahkan!'], 500);
        return response(['message' => 'Tag berhasil ditambahkan!']);
    }
}