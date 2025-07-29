<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // @TODO: signup (GET), signup (POST), login (GET), login (POST), logout(POST)

    public function showSignupForm()
    {
        return view('auth.signup');
    }

    public function signup()
    {

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
