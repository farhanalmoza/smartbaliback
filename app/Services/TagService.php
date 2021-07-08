<?php
namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function getAll()
    {
        $results = Tag::get();
        return datatables()->of($results)->make(true);
    }

    public function add($data)
    {
        $create = Tag::create($data);
        if(!$create) return response(['message' => 'Tag gagal ditambahkan!'], 500);
        return response(['message' => 'Tag berhasil ditambahkan!']);
    }
}