<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

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

    

    public function tempatIbadah()
    {
        return view('owner.tempatIbadah.index');
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

    public function editTempat($id)
    {
        $data['id'] = $id;
        return view('owner.tempat.edit', $data);
    }

    // rental mobil
    public function car()
    {
        return view('owner.mobil.index');
    }

    // crud mobil
    

    

    

    public function driver()
    {
        return view('owner.sopir.index');
    }

    public function rentalList()
    {
        return view('owner.daftarRental.index');
    }

    

     // crud sopir
    public function tambahSopir()
    {
        return view('owner.sopir.tambah');
    }

    public function editSopir($id)
    {
        $data['id'] = $id;
        return view('owner.sopir.edit', $data);
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
