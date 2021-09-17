<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function wisata()
    {
        return view('admin.wisata.index');
    }

    public function hotel()
    {
        return view('admin.hotel.index');
    }

    public function tempatIbadah()
    {
        return view('admin.tempatIbadah.index');
    }

    public function souvenir()
    {
        return view('admin.souvenir.index');
    }

    public function tambahTempat()
    {
        return view('admin.tempat.tambah');
    }

    public function detailTempat($slug, $id)
    {
        $data['slug'] = $slug;
        $data['id'] = $id;
        return view('admin.tempat.detail', $data);
    }

    public function editTempat($id)
    {
        $data['id'] = $id;
        return view('admin.tempat.edit', $data);
    }

    public function daftarPengguna()
    {
        return view('admin.daftarPengguna.index');
    }

    public function daftarTag()
    {
        return view('admin.daftarTag.index');
    }
    
    public function editProfil()
    {
        return view('admin.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('admin.gantiPassword.index');
    }
}
