<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // @TODO: signup (GET), signup (POST), login (GET), login (POST), logout(POST)

    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'Sing Up']);
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        auth()->login($user);

        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['pageTitle' => 'Login']);
    }

    public function login()
    {

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
