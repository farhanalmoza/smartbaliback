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

    public function update($data, $id)
    {
        $result = Car::find($id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update($data);
        return response(['message' => 'Tempat berhasil diubah!']);
    }

    public function getNewCar($id)
    {
        $result = Car::where('user_id', $id)->latest('created_at')->first();
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }

    // get detail car
    public function get($id)
    {
        $result = Car::with('pictures:id,car_id,picture')->where('id', $id)->first();
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }
}