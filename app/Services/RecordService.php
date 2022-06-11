<?php
namespace App\Services;

use App\Models\Record;
use App\Models\RecordAccom;
use App\Models\RecordHotel;
use App\Models\RecordPlace;

class RecordService {
    public function add($data, $tourist_attraction, $hotel, $accom)
    {
        $create = Record::create($data);

        if($create) {
            $record_id = $create->id;
            // jika ada tempat wisata
            if($tourist_attraction) {
                $tourist_attraction = explode(",", $tourist_attraction);
                foreach ($tourist_attraction as $ta) {
                    RecordPlace::create([
                        'record_id' => $record_id,
                        'place_id' => $ta
                    ]);
                }
            }

            // jika ada hotel
            if($hotel) {
                $hotel = explode(",", $hotel);
                foreach ($hotel as $htl) {
                    RecordHotel::create([
                        'record_id' => $record_id,
                        'hotel_id' => $htl
                    ]);
                }
            }

            // jika ada akomodasi
            if($accom) {
                $accom = explode(",", $accom);
                foreach ($accom as $akom) {
                    RecordAccom::create([
                        'record_id' => $record_id,
                        'accom_id' => $akom
                    ]);
                }
            }
            return response(['message' => 'Record berhasil ditambahkan!']);
        } else {
            return response(['message' => 'Gagal menambahkan record!'], 500);
        }
    }
}