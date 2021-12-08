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
