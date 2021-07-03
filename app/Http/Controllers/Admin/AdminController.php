<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
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
    public function daftarPengguna()
    {
        return view('admin.daftarPengguna.index');
    }
}
