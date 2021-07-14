<?php
namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingService
{
    public function updateFoto($file, $email)
    {
        $optimizerChain = OptimizerChainFactory::create();
        $path = "public/pictures/profile/";
        $filename = Str::random(20) .'.'. $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $img->encode('jpg', 60);
        Storage::disk('local')->put($path . $filename, $img, 'public');
        $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().$path.$filename;
        $optimizerChain->optimize($storagePath);
        $profile = Profile::where('email', $email);
        if($profile) {
            foreach ($profile->get() as $pro) {
                Storage::disk('local')->delete($pro->picture);
            }

            $profile->update([
                'picture' => $path . $filename
            ]);
        } else {
            $create = Profile::create([
                'picture' => $path . $filename
            ]);
        }
        return response(['message' => 'Foto berhasil diupdate']);
    }
}