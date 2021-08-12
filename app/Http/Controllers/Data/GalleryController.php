<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $gallery;

    public function __construct()
    {
        $this->gallery = app()->make(GalleryService::class);
    }

    public function uploadPicture(Request $request)
    {
    	$file = $request->file('file');
    	$id = $request->input('id');
    	return $this->gallery->uploadPicture($file, $id, 'public/pictures/galleries/');
    }
}
