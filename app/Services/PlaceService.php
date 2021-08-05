<?php
namespace App\Services;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PlaceService
{
    // get all
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

    // search
    public function searchTours($search)
    {
        $results = Place::where([
            ['type', '=', 'tour'],
            ['title', 'like', '%'.$search.'%']
        ])->get();
        return datatables()->of($results)->make(true);
    }
    public function searchHotels($search)
    {
        $results = Place::where([
            ['type', '=', 'hotel'],
            ['title', 'like', '%'.$search.'%']
        ])->get();
        return datatables()->of($results)->make(true);
    }
    public function searchWorships($search)
    {
        $results = Place::where([
            ['type', '=', 'worship'],
            ['title', 'like', '%'.$search.'%']
        ])->get();
        return datatables()->of($results)->make(true);
    }

    // get place by tag
    public function tagTours($idTag)
    {
        $results = Place::whereHas('tags', function($query) use($idTag) {
            return $query->where('tag_id', $idTag);
        })->where('type', 'tour');
        return datatables()->of($results)->make(true);
    }

    public function add($data, $files, $tags)
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
        foreach ($tags as $tag) {
            $create->tags()->attach($tag);
        }
        
        if($create) {
            return response(['message' => 'Tempat berhasil ditambahkan!']);
        } else {
            return response(['message' => 'Gagal menambahkan tempat!'], 500);
        }
    }

    public function get($id)
    {
        $result = Place::find($id);
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }

    public function update($data, $files, $id)
    {
        if ($files) {
            $path = "public/pictures/thumbnail/";

            // delete old picture
            $places = Place::where('id', $id)->get();
            foreach ($places as $place) {
                Storage::disk('local')->delete($path.$place->thumbnail);
            }
            
            $optimizerChain = OptimizerChainFactory::create();
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
        }

        $result = Place::find($id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update($data);
        return response(['message' => 'Tempat berhasil diubah!']);
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