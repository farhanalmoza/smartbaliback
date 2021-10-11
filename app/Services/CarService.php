<?php
namespace App\Services;

use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarService
{
    public function getCars($user_id)
    {
        $results = Car::with('pictures:id,car_id,picture')->where('user_id', $user_id)->get();
        return datatables()
        ->of($results)
        ->addIndexColumn()
        ->addColumn('actions', function($rows) {
            $rows = json_encode($rows);
            $rows = json_decode($rows);
            $url = url('owner');
            $id = $rows->id;
            $btn = "<td> <div class='btn-group'>";
            $btn .= "<a href='".$url. "/edit-mobil/".$id."' class='btn btn-info btn-sm'>Ubah</a>";
            $btn .= "<a href='".$url. "/mobil/".$id."' class='btn btn-primary btn-sm'>Detail</a>";
            $btn .= "<button data-id='$id' class='btn btn-sm btn-danger delete'>Hapus</button>";
            $btn .= '</div> </td>';
            return $btn;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    // get all verify/unverify data
    public function getVerifyCars() // get all verify cars
    {
        $results = Car::where('verified', null)->get();
        return datatables()
        ->of($results)
        ->addIndexColumn()
        ->addColumn('actions', function($rows) {
            $rows = json_encode($rows);
            $rows = json_decode($rows);
            $url = url('admin');
            $id = $rows->id;
            $btn = "<td> <div class='btn-group'>";
            $btn .= "<a href='".$url. "/mobil/".$id."' class='btn btn-primary btn-sm'>Detail</a>";
            $btn .= '</div> </td>';
            return $btn;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
    public function getUnverifiedCars() // get all unverified cars
    {
        $results = Car::where('verified', 'false')->get();
        return datatables()
        ->of($results)
        ->addIndexColumn()
        ->addColumn('actions', function($rows) {
            $rows = json_encode($rows);
            $rows = json_decode($rows);
            $url = url('admin');
            $id = $rows->id;
            $btn = "<td> <div class='btn-group'>";
            $btn .= "<a href='".$url. "/mobil/".$id."' class='btn btn-primary btn-sm'>Detail</a>";
            $btn .= '</div> </td>';
            return $btn;
        })
        ->rawColumns(['actions'])
        ->make(true);
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
        return response(['message' => 'Data mobil berhasil diubah!']);
    }

    public function delete($id)
    {
        $pathGal = "public/pictures/galleries/";
        $result = Car::with('pictures:id,place_id,picture')->where('id', $id)->first();
        if(!$result) return response(['message' => 'Opps!. Ada kesahalan'], 406);
        // delete pict from gallery
        foreach ($result->pictures as $picture) {
            Storage::disk('local')->delete($pathGal.$picture->picture);
        }
        
        $result->delete();
        return response(['message' => 'Data mobil berhasil dihapus!']);
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