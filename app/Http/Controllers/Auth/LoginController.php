<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function attemptLogin(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return false;
        }

        // 1. Cek bcrypt (default Laravel)
        if (Hash::check($request->password, $user->password)) {
            $this->guard()->login($user, $request->filled('remember'));
            return true;
        }

        // 2. Cek SHA-1 (hash lama)
        if (sha1($request->password) === $user->password) {
            // Upgrade langsung ke bcrypt
            $user->password = Hash::make($request->password);
            $user->save();

            $this->guard()->login($user, $request->filled('remember'));
            return true;
        }

        return false;
    }
    protected function authenticated(Request $request, $user)
    {
        // dd($user->user_type_id );

        if($user->user_type_id == 100) {
            return view('home'); // it will be according to your routes.

        }

        if($user->user_type_id == 1) {

            return  redirect()->intended('student_dashboard');

        }
        if($user->user_type_id == 2) {

            return  redirect()->intended('teacher_dashboard');

        }
        if($user->user_type_id == 3) {

            return  redirect()->intended('conciliar_dashboard');

        }
        if($user->user_type_id == 4) {

            return  redirect()->intended('family_dashboard');

        }
        else {
            return redirect()->intended('home'); // it also be according to your need and routes
        }
    }
}
