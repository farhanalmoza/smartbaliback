<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\HotelService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    protected $hotel;

    public function __construct()
    {
        $this->hotel = app()->make(HotelService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->hotel->getHotels();
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
        $tags = $request->input('tags');

        $data = [
            'user_id'     => $request->input('user_id'),
            'title'       => $request->input('title'),
            'slug'        => Str::slug($request->input('title'), '-'),
            'desc'        => $request->input('desc'),
            'address'     => $request->input('alamat'),
            'latitude'    => $request->input('latitude'),
            'longtitude'  => $request->input('longtitude'),
        ];
        
        return $this->hotel->add($data, $files, $tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->hotel->get($id);
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
