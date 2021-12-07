<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class OwnerHotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('owner_hotel.dashboard.index');
    }

    // pengaturan
    public function editProfil()
    {
        return view('owner_hotel.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('owner_hotel.gantiPassword.index');
    }
}
