<?php

namespace App\Http\Controllers;

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
        print_r($request->all());
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
