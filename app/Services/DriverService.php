<?php
namespace App\Services;

use App\Models\Driver;

class DriverService
{
    public function getAll($user_id)
    {
        $results = Driver::where('user_id', $user_id)->get();
        return datatables()
        ->of($results)
        ->addIndexColumn()
        ->addColumn('actions', function($rows) {
            $rows = json_encode($rows);
            $rows = json_decode($rows);
            $url = url('owner-car');
            $id = $rows->id;
            $btn = "<td> <div class='btn-group'>";
            $btn .= "<a href='".$url. "/edit-sopir/".$id."' class='btn btn-info btn-sm'>Ubah</a>";
            $btn .= "<a href='".$url. "/sopir/".$id."' class='btn btn-primary btn-sm'>Detail</a>";
            $btn .= "<button data-id='$id' class='btn btn-sm btn-danger delete'>Hapus</button>";
            $btn .= '</div> </td>';
            return $btn;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function add($data)
    {
        $create = Driver::create($data);
        if(!$create) return response(['message' => 'Data sopir gagal ditambahkan!'], 500);
        return response(['message' => 'Data sopir berhasil ditambahkan!']);
    }

    // get detail car
    public function get($id)
    {
        $result = Driver::where('id', $id)->first();
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }
}
