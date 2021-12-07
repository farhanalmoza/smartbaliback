<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class OwnerTourController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('owner_tour.dashboard.index');
    }

    public function index()
    {
        return view('owner_tour.wisata.index');
    }

    public function detail($id)
    {
        $data['id'] = $id;
        return view('owner_tour.wisata.detail', $data);
    }

    public function tambahTempat()
    {
        return view('owner_tour.wisata.tambah');
    }

    public function editTempat($id)
    {
        $data['id'] = $id;
        return view('owner_tour.wisata.edit', $data);
    }

    // pengaturan
    public function editProfil()
    {
        return view('owner_tour.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('owner_tour.gantiPassword.index');
    }
}
