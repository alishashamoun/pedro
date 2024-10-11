<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Auth;
use Illuminate\Support\Facades\Auth;

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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $role = Auth::user()->getRoleNames();

        switch ($role[0]) {
            case 'Admin':
                return '/admin/dashboard';
                break;
            case 'User':
                return '/users/dashboard';
                break;
            case 'vendor':
                return '/vendor/dashboard';
                break;
            case 'agent':
                return '/agent/dashboard';
                break;
            case 'account manager':
                return '/manager/dashboard';
                break;
            default:
                return 'login';
                break;
        }
    }





    public function logout()
    {
        if (Auth::check()) {
            $user = Auth::logout();
            return redirect()->to('/')->with('success', 'User Logout successfully.');
        } else {
            return redirect()->to('/')->with('error', 'User Logout successfully.');
        }
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->users;

            if (!$user->is_email_verified) {
                $verifyUser->users->is_email_verified = 1;
                $verifyUser->users->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('message', $message);
    }
}
