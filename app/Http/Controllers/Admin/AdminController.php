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

    public function editTempat($id)
    {
        $data['id'] = $id;
        return view('admin.tempat.edit', $data);
    }
    // detail
    public function detailTempat($slug, $id)
    {
        $data['slug'] = $slug;
        $data['id'] = $id;
        return view('admin.tempat.detail', $data);
    }

    public function detailMobil($id)
    {
        $data['id'] = $id;
        return view('admin.mobil.detail', $data);
    }

    // verifikasi
    public function verifikasiTempat()
    {
        return view('admin.verifikasi.tempat');
    }

    public function verifikasiMobil()
    {
        return view('admin.verifikasi.mobil');
    }

    public function daftarPengguna()
    {
        return view('admin.pengguna.index');
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
