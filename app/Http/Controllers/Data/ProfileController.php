<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;

class ProfileController extends Controller
{
    protected $setting;

    public function __construct()
    {
        $this->setting = app()->make(SettingService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        return $this->setting->getProfile($email);
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
