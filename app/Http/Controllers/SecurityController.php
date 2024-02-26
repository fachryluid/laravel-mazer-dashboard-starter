<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.security.index');
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->firstOrFail();
            $user->password = Hash::make($request->new_password);

            $user->save();

            Session::flush();
            Auth::logout();

            return redirect()
                ->route('auth.login.index')
                ->with('success', 'Password berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}
