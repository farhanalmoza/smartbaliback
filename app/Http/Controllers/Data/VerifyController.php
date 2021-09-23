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

    public function verify($id)
    {
        return $this->verify->verify($id);
    }

    public function unverify($id)
    {
        return $this->verify->unverify($id);
    }
}
