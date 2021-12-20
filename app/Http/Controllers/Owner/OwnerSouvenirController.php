<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class OwnerSouvenirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('owner_souvenir.dashboard.index');
    }

    // CRUD
    public function souvenir()
    {
        return view('owner_souvenir.souvenir.index');
    }

    public function tambahSouvenir()
    {
        return view('owner_souvenir.souvenir.tambah');
    }

    public function detailSouvenir($id)
    {
        $data['id'] = $id;
        return view('owner_souvenir.souvenir.detail', $data);
    }

    public function editSouvenir($id)
    {
        $data['id'] = $id;
        return view('owner_souvenir.souvenir.edit', $data);
    }

    // pengaturan
    public function editProfil()
    {
        return view('owner_souvenir.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('owner_souvenir.gantiPassword.index');
    }
}
