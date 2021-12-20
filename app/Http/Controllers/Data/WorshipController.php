<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\WorshipService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorshipController extends Controller
{
    protected $worship;

    public function __construct()
    {
        $this->worship = app()->make(WorshipService::class);
    }

    public function index() {
        return $this->worship->getWorships();
    }

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
        
        return $this->worship->add($data, $files, $tags);
    }

    public function show($id)
    {
        return $this->worship->get($id);
    }

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
        return $this->worship->update($data, $files, $id, $tags);
    }

    public function destroy($id)
    {
        return $this->worship->delete($id);
    }
}
