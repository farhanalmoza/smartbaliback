<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\VerifyService;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    protected $verify;

    public function __construct()
    {
        $this->verify = app()->make(VerifyService::class);   
    }

    // places
    public function verifyPlace($id)
    {
        return $this->verify->verifyPlace($id);
    }

    public function unverifyPlace($id)
    {
        return $this->verify->unverifyPlace($id);
    }

    // cars
    public function verifyCar($id)
    {
        return $this->verify->verifyCar($id);
    }

    public function unverifyCar($id)
    {
        return $this->verify->unverifyCar($id);
    }
}
