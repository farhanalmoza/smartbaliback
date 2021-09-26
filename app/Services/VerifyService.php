<?php
namespace App\Services;

use App\Models\Message;
use App\Models\Place;

class VerifyService
{
    public function getAllNotif($user_id)
    {
        $results = Message::where('user_id', $user_id)->get();
        return datatables()->of($results)->make(true);
    }

    public function verify($id)
    {
        $result = Place::where('id', $id);
        $user_id = $result->get()[0]->user_id;
        $data = [
            'user_id' => $user_id,
            'place_id' => $id,
            'message' => 'Tempat yang Anda ajukan sudah lolos verifikasi'
        ];
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'true']);
        Message::create($data);
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