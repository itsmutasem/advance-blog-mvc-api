<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // @TODO: signup (GET), signup (POST), login (GET), login (POST), logout(POST)

    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'Sing Up']);
    }

    public function signup(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

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

    }
}
