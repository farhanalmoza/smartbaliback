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

    // mobil
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

    public function detailMobil($id)
    {
        $data['id'] = $id;
        return view('owner_car.mobil.detail', $data);
    }

    public function editMobil($id)
    {
        $data['id'] = $id;
        return view('owner_car.mobil.edit', $data);
    }

    // sopir
    public function driver()
    {
        return view('owner_car.sopir.index');
    }

    public function tambahSopir()
    {
        return view('owner_car.sopir.tambah');
    }

    public function editSopir($id)
    {
        $data['id'] = $id;
        return view('owner_car.sopir.edit', $data);
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
