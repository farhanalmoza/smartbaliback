<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\SouvenirService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SouvenirController extends Controller
{
    protected $souvenir;

    public function __construct()
    {
        $this->souvenir = app()->make(SouvenirService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->souvenir->getSouvenirs();
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
        
        return $this->souvenir->add($data, $files, $tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->souvenir->get($id);
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
        ];
        if (!$files) {
            $data['thumbnail'] = $request->input('files');
        }
        return $this->souvenir->update($data, $files, $id, $tags);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->souvenir->delete($id);
    }
}
