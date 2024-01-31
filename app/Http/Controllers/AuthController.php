<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthenticateRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_index()
    {
        return view('pages.auth.login');
    }

    public function login_authenticate(LoginAuthenticateRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('dashboard.index')
                ->withSuccess('Selamat datang!');
        }

        return redirect()
            ->back()
            ->withErrors(['message' => 'Ups! Username atau password salah']);
    }
}
