<?php
namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingService
{
    public function getProfile($email)
    {
        $profile_id = Profile::where('email', $email)->first()->id;
        $profile = Profile::find($profile_id);
        if(!$profile) return response(['message' => 'Oops, something wrong!'], 406);
        return response($profile);
    }

    public function update($data, $email)
    {
        $result = Profile::where('email', $email);
        if(!$result) return response(['message' => 'Profile gagal diubah!'], 406);
        $result->update($data);
        return response(['message' => 'Profile berhasil diubah!']);
    }

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
                Storage::disk('local')->delete($path.$pro->picture);
            }

            $profile->update([
                'picture' => $filename
            ]);
        } else {
            $create = Profile::create([
                'picture' => $filename
            ]);
        }
        return response(['message' => 'Foto berhasil diupdate']);
    }
}