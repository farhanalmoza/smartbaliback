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

    public function get($id)
    {
        $records = Record::where('backpacker_id', $id)->get();
        $no_hp = Record::where('backpacker_id', $id)->value('no_hp');

        $result = [
            'id_backpacker' => $id,
            'no_hp' => $no_hp,
            'jumlah_perjalanan' => count($records),
        ];

        for ($i = 0; $i < count($records); $i++) {
            $record_id = $records[$i]->id;
            $tmp_wisata = RecordPlace::where('record_id', $record_id)->get();
            $akomodasi = RecordAccom::where('record_id', $record_id)->first();

            if($akomodasi) {
                $id_akomodasi = $akomodasi->accom_id;
            } else {
                $id_akomodasi = null;
            }

            $result["list_perjalanan"][$i] = [
                'id_perjalanan' => $record_id,
                'tgl_perjalanan' => $records[$i]->check_in,
                'tgl_pulang' => $records[$i]->check_out,
                'id_akomodasi' => $id_akomodasi,
            ];

            for ($j = 0; $j < count($tmp_wisata); $j++) {
                $result["list_perjalanan"][$i]["id_tempat_wisata"][$j] = $tmp_wisata[$j]->place_id;
            }
        }

        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }
}