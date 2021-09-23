<?php
namespace App\Services;

use App\Models\Place;

class VerifyService
{
    public function verify($id)
    {
        $result = Place::where('id', $id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'true']);
        return response(['message' => 'Tempat berhasil diverifikasi!']);
    }

    public function unverify($id)
    {
        $result = Place::where('id', $id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'false']);
        return response(['message' => 'Tempat ini tidak lolos verifikasi!']);
    }
}