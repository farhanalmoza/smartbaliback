<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('owner.dashboard.index');
    }

    public function wisata()
    {
        return view('owner.wisata.index');
    }

    public function hotel()
    {
        return view('owner.hotel.index');
    }

    public function tempatIbadah()
    {
        return view('owner.tempatIbadah.index');
    }

    public function souvenir()
    {
        return view('owner.souvenir.index');
    }

    public function detailTempat($id)
    {
        $data['id'] = $id;
        return view('owner.tempat.detail', $data);
    }

    public function tambahTempat()
    {
        return view('owner.tempat.tambah');
    }

    public function car()
    {
        return view('owner.mobil.index');
    }

    public function driver()
    {
        return view('owner.sopir.index');
    }

    public function rentalList()
    {
        return view('owner.daftarRental.index');
    }

    public function editTempat($id)
    {
        $data['id'] = $id;
        return view('owner.tempat.edit', $data);
    }

    // pengaturan
    public function editProfil()
    {
        return view('owner.editProfil.index');
    }

    public function gantiPassword()
    {
        return view('owner.gantiPassword.index');
    }
}
