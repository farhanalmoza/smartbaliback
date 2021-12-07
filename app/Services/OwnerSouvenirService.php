<?php
namespace App\Services;

use App\Models\OwnerSouvenir;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class OwnerSouvenirService
{
    public function getProfile($email)
    {
        $profile_id = OwnerSouvenir::where('email', $email)->first()->id;
        $profile = OwnerSouvenir::find($profile_id);
        if(!$profile) return response(['message' => 'Oops, something wrong!'], 406);
        return response($profile);
    }

    public function update($data, $email)
    {
        $result = OwnerSouvenir::where('email', $email);
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
        $profile = OwnerSouvenir::where('email', $email);
        if($profile) {
            foreach ($profile->get() as $pro) {
                Storage::disk('local')->delete($path.$pro->picture);
            }

            $profile->update([
                'picture' => $filename
            ]);
        } else {
            $create = OwnerSouvenir::create([
                'picture' => $filename
            ]);
        }
        return response(['message' => 'Foto berhasil diupdate']);
    }

    public function gantiPass($data)
    {
        $idUser = auth()->user()->id;
        $user = User::find($idUser);
        if(!$user) return response(['message' => 'user tidak ditemukan'], 404);
        if($data['new_pass'] != $data['confirm_pass']) return response(['message' => 'Konfirmasi password tidak sama'], 422);
        if(Hash::check($data['old_pass'], $user->password)) {
            $update = $user->update([
                'password' => Hash::make($data['new_pass'])
            ]);
            if(!$update) return response(['message' => 'terjadi kesalahan'], 500);
            return response(['message' => 'Password berhasil dirubah']); 
        } else {
            return response(['message' => 'Password Lama tidak sesuai'], 422);
        }
    }
}