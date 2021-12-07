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
