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

    public function tours()
    {
        return $this->place->getTours();
    }

    public function hotels()
    {
        return $this->place->getHotels();
    }

    public function worships()
    {
        return $this->place->getWorships();
    }

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
        
        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'), '-'),
            'desc' => $request->input('desc'),
            'address' => $request->input('alamat'),
            'location' => $request->input('koordinat'),
            'type' => $request->input('tipe'),
        ];
        // dd($data['slug']);
        return $this->place->add($data, $files);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
