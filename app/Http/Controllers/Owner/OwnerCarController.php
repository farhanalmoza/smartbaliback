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
