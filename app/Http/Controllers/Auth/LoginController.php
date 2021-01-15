<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;

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

    public function redirectTo(){
        if (Auth::user()->KODE_JABATAN == 1) {
            return redirect()->route('owner');
        } 
        else if (Auth::user()->KODE_JABATAN == 2) {
            return redirect()->route('admin-gudang');
        }
        else if(Auth::user()->KODE_JABATAN == 3){
            return redirect()->route('manajer-marketing');
        }
        else if (Auth::user()->KODE_JABATAN == 4) {
            return redirect()->route('sales-a');
        }
        else if (Auth::user()->KODE_JABATAN == 5) {
            return redirect()->route('sales-b');
        }
        else if (Auth::user()->KODE_JABATAN == 6) {
            return redirect()->route('operator-mesin');
        }
    }

    public function username()
    {
        return 'username';
    }
}
