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

    public function hotel()
    {
        return view('owner_hotel.hotel.index');
    }

    public function tambahHotel()
    {
        return view('owner_hotel.hotel.tambah');
    }

    public function detail($id)
    {
        $data['id'] = $id;
        return view('owner_hotel.hotel.detail', $data);
    }

    public function tambahTempat()
    {
        return view('owner_hotel.hotel.tambah');
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
