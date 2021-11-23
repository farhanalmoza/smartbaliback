<?php
namespace App\Services;

use App\Models\Tour;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TourService
{
    // get all
    public function getVerifyPlaces() // get all verify places
    {
        $results = Tour::where('verified', null)->get();
        return datatables()->of($results)->make(true);
    }
    public function getUnverifiedPlaces() // get all unverified places
    {
        $results = Tour::where('verified', 'false')->get();
        return datatables()->of($results)->make(true);
    }
    public function getTours()
    {
        $results = Tour::get();
        return datatables()->of($results)->make(true);
    }

    // search
    public function searchTours($search)
    {
        $results = Tour::where([
            ['title', 'like', '%'.$search.'%']
        ])->get();
        return datatables()->of($results)->make(true);
    }

    // get place by tag
    public function tagTours($idTag)
    {
        $results = Tour::whereHas('tags', function($query) use($idTag) {
            return $query->where('tag_id', $idTag);
        });
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

        $create = Tour::create($data);
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
            'tour' => Tour::with('pictures:id,place_id,picture')->where('id', $id)->first(),
            'tag'  => Tour::find($id)->tags
        ];
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }

    public function update($data, $files, $id, $tags)
    {
        if ($files) {
            $path = "public/pictures/thumbnail/";

            // delete old picture
            $tours = Tour::where('id', $id)->get();
            foreach ($tours as $tour) {
                Storage::disk('local')->delete($path.$tour->thumbnail);
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

        $result = Tour::find($id);
        if(!$result) return response(['message' => 'Opps, Terjadi kesalahan!'], 406);
        $result->update($data);
        $result->tags()->sync($tags);
        return response(['message' => 'Tempat berhasil diubah!']);
    }

    public function delete($id)
    {
        $pathGal = "public/pictures/galleries/";
        $result = Tour::with('pictures:id,place_id,picture')->where('id', $id)->first();
        if(!$result) return response(['message' => 'Opps!. Ada kesahalan'], 406);
        // delete pict from gallery
        foreach ($result->pictures as $picture) {
            Storage::disk('local')->delete($pathGal.$picture->picture);
        }
        
        // delete picture
        $path = "public/pictures/thumbnail/";
        $results = Tour::where('id', $id)->get();
        foreach ($results as $res) {
            Storage::disk('local')->delete($path.$res->thumbnail);
        }
        $result->delete();
        return response(['message' => 'Tempat berhasil dihapus!']);
    }
}