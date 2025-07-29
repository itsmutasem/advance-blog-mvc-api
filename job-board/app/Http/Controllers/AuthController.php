<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
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

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'error' => 'The provided credentials do not match or records',
        ])->withInput();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
