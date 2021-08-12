<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Gallery;

class GalleryService
{
	public function uploadPicture($file, $id, $path)
	{
		$optimizerChain = OptimizerChainFactory::create();
        $filename = Str::random(20) .'.'. $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $img->encode('jpg', 60);
        Storage::disk('local')->put($path . $filename, $img, 'public');
        $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().$path.$filename;
        $optimizerChain->optimize($storagePath);
        $create = Gallery::create([
    		'place_id' => $id,
    		'picture' => $filename   	
        ]);
        if(!$create) return response(['message' => 'Upload Gambar Gagal'], 500);
        return response([
        	'message' => 'Upload Gambar Success',
        	'create'  => $create
        ]);
	}
}