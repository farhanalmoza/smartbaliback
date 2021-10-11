<?php
namespace App\Services;

use App\Models\Car;
use App\Models\Message;
use App\Models\Place;

class VerifyService
{
    public function getAllNotif($user_id)
    {
        $results = Message::where('user_id', $user_id)->get();
        return datatables()->of($results)->make(true);
    }

    public function verifyPlace($id)
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

    public function unverifyPlace($id)
    {
        $result = Place::where('id', $id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'false']);
        return response(['message' => 'Tempat ini tidak lolos verifikasi!']);
    }

    public function verifyCar($id)
    {
        $result = Car::where('id', $id);
        $user_id = $result->get()[0]->user_id;
        $data = [
            'user_id' => $user_id,
            'car_id' => $id,
            'message' => 'Tempat yang Anda ajukan sudah lolos verifikasi'
        ];
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'true']);
        Message::create($data);
        return response(['message' => 'Mobil berhasil diverifikasi!']);
    }

    public function unverifyCar($id)
    {
        $result = Car::where('id', $id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'false']);
        return response(['message' => 'Mobil ini tidak lolos verifikasi!']);
    }
}