<?php
namespace App\Services;

use App\Models\Place;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PlaceService
{
    // get all
    public function getPlaces() // get all places
    {
        $results = Place::where('verified', null)->get();
        return datatables()->of($results)->make(true);
    }
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
    public function getSouvenirs()
    {
        $results = Place::where('type', 'souvenir')->get();
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
    public function tagHotels($idTag)
    {
        $results = Place::whereHas('tags', function($query) use($idTag) {
            return $query->where('tag_id', $idTag);
        })->where('type', 'hotel');
        return datatables()->of($results)->make(true);
    }
    public function tagWorships($idTag)
    {
        $results = Place::whereHas('tags', function($query) use($idTag) {
            return $query->where('tag_id', $idTag);
        })->where('type', 'worship');
        return datatables()->of($results)->make(true);
    }
    public function tagSouvenirs($idTag)
    {
        $results = Place::whereHas('tags', function($query) use($idTag) {
            return $query->where('tag_id', $idTag);
        })->where('type', 'souvenir');
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
        $result = [
            'place' => Place::with('pictures:id,place_id,picture')->where('id', $id)->first(),
            'tags'  => Place::find($id)->tags
        ];
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }

    public function update($data, $files, $id, $tags)
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
        $result->tags()->sync($tags);
        return response(['message' => 'Tempat berhasil diubah!']);
    }

    public function verify($id)
    {
        $result = Place::where('id', $id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update(['verified' => 'true']);
        return response(['message' => 'Tempat berhasil diverifikasi!']);
    }

    public function delete($id)
    {
        $pathGal = "public/pictures/galleries/";
        $result = Place::with('pictures:id,place_id,picture')->where('id', $id)->first();
        if(!$result) return response(['message' => 'Opps!. Ada kesahalan'], 406);
        // delete pict from gallery
        foreach ($result->pictures as $picture) {
            Storage::disk('local')->delete($pathGal.$picture->picture);
        }
        
        // delete picture
        $path = "public/pictures/thumbnail/";
        $results = Place::where('id', $id)->get();
        foreach ($results as $res) {
            Storage::disk('local')->delete($path.$res->thumbnail);
        }
        $result->delete();
        return response(['message' => 'Tempat berhasil dihapus!']);
    }
}