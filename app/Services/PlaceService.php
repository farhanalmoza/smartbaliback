<?php
namespace App\Services;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PlaceService
{
    public function getTours()
    {
        $results = Place::where('type', 'tour')->get();
        return datatables()->of($results)->make(true);
    }

    public function getHotels()
    {
        $results = Place::where('type', 'hotel')->get();
        return datatables()->of($results)->make(true);
    }

    public function getWorships()
    {
        $results = Place::where('type', 'worship')->get();
        return datatables()->of($results)->make(true);
    }

    public function add($data, $files)
    {
        $optimizerChain = OptimizerChainFactory::create();
        $path = "public/pictures/thumbnail/";
        $pathOfFile = [];
        foreach ($files as $file) {
            $filename = Str::random(20).'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath());
            $img->encode('jpg', 60);
            Storage::disk('local')->put($path . $filename, $img, 'public');
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().$path.$filename;
            $optimizerChain->optimize($storagePath);
            array_push($pathOfFile, $filename);
        }

        foreach ($pathOfFile as $val) {
            $data["thumbnail"] = $val;
        }

        $create = Place::create($data);
        if($create) {
            return response(['message' => 'Tempat berhasil ditambahkan!']);
        } else {
            return response(['message' => 'Gagal menambahkan tempat!'], 500);
        }
    }

    public function delete($id)
    {
        $result = Place::where('id', $id);
        if(!$result) return response(['message' => 'Opps!. Ada kesahalan'], 406);
        
        // delete picture
        $path = "public/pictures/thumbnail/";
        $results = Place::where('id', $id)->get();
        foreach ($results as $res) {
            Storage::disk('local')->delete($path.$res->picture);
        }
        $result->delete();
        return response(['message' => 'Tempat berhasil dihapus!']);
    }
}