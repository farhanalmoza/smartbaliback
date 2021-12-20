<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class OwnerCarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('owner_car.dashboard.index');
    }

    public function index()
    {
        return view('owner_car.mobil.index');
    }

    public function tambahMobil()
    {
        return view('owner_car.mobil.tambah');
    }

    public function tambahGambarMobil($id)
    {
        $data['id'] = $id;
        return view('owner_car.mobil.tambahGambar', $data);
    }

    // pengaturan
    public function editProfil()
    {
        return view('owner_car.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('owner_car.gantiPassword.index');
    }
}
