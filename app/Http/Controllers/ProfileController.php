<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('pages.dashboard.profile.index', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->birthday = $request->birthday;
            $user->gender = $request->gender;

            $user->save();

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function avatar(UpdateAvatarRequest $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();

            if ($request->hasFile('avatar')) {
                Storage::delete('public/uploads/avatars/' . $user->avatar);
                $user->avatar = basename($request->file('avatar')->store('public/uploads/avatars'));
            }

            $user->save();

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}
