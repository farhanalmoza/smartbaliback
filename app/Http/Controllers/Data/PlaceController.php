<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    protected $place;

    public function __construct()
    {
        $this->place = app()->make(PlaceService::class);
    }

    // get all
    public function verifyPlaces() { return $this->place->getVerifyPlaces(); } // get all verify places
    public function unverifiedPlaces() { return $this->place->getUnverifiedPlaces(); } // get all unverified places
    // public function tours() { return $this->place->getTours(); }
    public function hotels() { return $this->place->getHotels(); }
    public function worships() { return $this->place->getWorships(); }
    public function souvenirs() { return $this->place->getSouvenirs(); }

    // get by search
    public function searchTours($search) { return $this->place->searchTours($search); }
    public function searchHotels($search) { return $this->place->searchHotels($search); }
    public function searchWorships($search) { return $this->place->searchWorships($search); }

    // get place by Tag
    public function tagTours($idTag) { return $this->place->tagTours($idTag); }
    public function tagHotels($idTag) { return $this->place->tagHotels($idTag); }
    public function tagWorships($idTag) { return $this->place->tagWorships($idTag); }
    public function tagSouvenirs($idTag) { return $this->place->tagSouvenirs($idTag); }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // variabel
        $files = $request->file('files');
        $tags = $request->input('tags');

        $data = [
            'user_id'     => $request->input('user_id'),
            'title'       => $request->input('title'),
            'slug'        => Str::slug($request->input('title'), '-'),
            'desc'        => $request->input('desc'),
            'address'     => $request->input('alamat'),
            'latitude'    => $request->input('latitude'),
            'longtitude'  => $request->input('longtitude'),
            'type'        => $request->input('tipe'),
        ];
        
        return $this->place->add($data, $files, $tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->place->get($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // variabel
        $files = $request->file('files');
        $tags = $request->input('tags');
        $data = [
            'user_id'     => $request->input('user_id'),
            'title'       => $request->input('title'),
            'slug'        => Str::slug($request->input('title'), '-'),
            'desc'        => $request->input('desc'),
            'address'     => $request->input('alamat'),
            'latitude'    => $request->input('latitude'),
            'longtitude'  => $request->input('longtitude'),
            'type'        => $request->input('tipe'),
        ];
        if (!$files) {
            $data['thumbnail'] = $request->input('files');
        }
        return $this->place->update($data, $files, $id, $tags);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->place->delete($id);
    }
}
