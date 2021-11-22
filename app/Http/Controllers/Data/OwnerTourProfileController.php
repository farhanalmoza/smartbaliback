<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Request;

class OwnerTourProfileController extends Controller
{
    protected $setting;

    public function __construct()
    {
        $this->setting = app()->make(SettingService::class);
    }

    public function show($email)
    {
        return $this->setting->getProfile($email);
    }

    public function update(Request $request, $email)
    {
        $data = [
            'name'          => $request->input('nama'),
            'phone'         => $request->input('phone'),
            'bank'          => $request->input('bank'),
            'acc_bank'      => $request->input('acc_bank'),
            'holder_name'   => $request->input('holder_name'),
            'address'       => $request->input('alamat'),
        ];
        return $this->setting->update($data, $email);
    }

    public function updateFoto(Request $request, $email)
    {
        $request->validate([
            'picture' => 'required|mimes:jpg,png,jpeg'
        ]);
        $file = $request->file('picture');
        return $this->setting->updateFoto($file, $email);
    }

    public function gantiPass(Request $request)
    {
        $data = [
            'old_pass' => $request->input('old_pass'),
            'new_pass' => $request->input('new_pass'),
            'confirm_pass' => $request->input('confirm_pass'),
        ];
        return $this->setting->gantiPass($data);
    }
}
