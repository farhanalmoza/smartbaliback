<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class OwnerWorshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('owner_worship.dashboard.index');
    }

    // main
    public function tempatIbadah()
    {
        return view('owner_worship.tempatIbadah.index');
    }

    public function detail($id)
    {
        $data['id'] = $id;
        return view('owner_worship.tempatIbadah.detail', $data);
    }

    public function tambahTempat()
    {
        return view('owner_worship.tempatIbadah.tambah');
    }

    public function editTempat($id)
    {
        $data['id'] = $id;
        return view('owner_worship.tempatIbadah.edit', $data);
    }

    // pengaturan
    public function editProfil()
    {
        return view('owner_worship.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('owner_worship.gantiPassword.index');
    }
}
