<?php
namespace App\Services;

use App\Models\Car;

class CarService
{
    public function getCars()
    {
        $results = Car::get();
        return datatables()->of($results)->make(true);
    }

    public function add($data)
    {
        $create = Car::create($data);
        if(!$create) return response(['message' => 'Data mobil gagal ditambahkan!'], 500);
        return response(['message' => 'Data mobil berhasil ditambahkan!']);
    }
}