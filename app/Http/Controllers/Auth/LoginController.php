<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ( auth()->user()->is_admin == 1 ) {
                return redirect('admin/dashboard');
            } else {
                if ( auth()->user()->type == 'tour' ) {
                    return redirect('owner-tour/dashboard');
                } else if ( auth()->user()->type == 'hotel' ) {
                    return redirect('owner-hotel/dashboard');
                } else if ( auth()->user()->type == 'worship' ) {
                    return redirect('owner-worship/dashboard');
                } else if ( auth()->user()->type == 'souvenir' ) {
                    return redirect('owner-souvenir/dashboard');
                } else {
                    return redirect('owner-car/dashboard');
                }
            }

            return $this->sendLoginResponse($request);
        }
        
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
