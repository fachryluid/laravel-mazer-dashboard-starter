<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthenticateRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login_index()
    {
        $setting = Setting::where('id', 1)->first();

        return view('pages.auth.login', compact('setting'));
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

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()
            ->route('auth.login.index');
    }
}
