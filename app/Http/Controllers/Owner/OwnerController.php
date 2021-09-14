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
