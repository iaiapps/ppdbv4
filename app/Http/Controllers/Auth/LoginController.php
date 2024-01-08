<?php

namespace App\Http\Controllers\Auth;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    // overrid auth.login
    public function showLoginForm()
    {
        $onoff = Setting::where('name', 'onoff')->first();
        if (isset($onoff) && $onoff->value == 0) {
            $show = 'off';
        } else {
            $show = 'on';
        }
        return view('auth.login', compact('show'));
    }

    //  override ganti email ke email_number
    public function username()
    {
        return 'email_number';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
