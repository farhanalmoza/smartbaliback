<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\VerifyService;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    protected $verify;

    public function __construct()
    {
        $this->verify = app()->make(VerifyService::class);   
    }

    public function index($user_id)
    {
        return $this->verify->getAllNotif($user_id);
    }
}
