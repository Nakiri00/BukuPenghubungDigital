<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        $user_type_id= Auth::user()->user_type_id;
        if($user_type_id == 1){
            return route('student_dashboard');
        }
        if($user_type_id == 2){
            return route('teacher_dashboard');
        }
        if($user_type_id == 3){
            return route('conciliar_dashboard.index');
        }
        if($user_type_id == 4){
            return route('family_dashboard');
        }

            return route('welcome');

        }


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type_id' => $data['user_type_id'],
        ]);
    }
}
