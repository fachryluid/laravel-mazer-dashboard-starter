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
            $data = $request->validated();
            $user = User::where('id', auth()->user()->id)->first();
            $user->update($data);

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }

    public function avatar(UpdateAvatarRequest $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();

            if ($request->hasFile('avatar')) {
                Storage::delete('public/avatars/' . $user->avatar);
                $user->avatar = basename($request->file('avatar')->store('public/avatars'));
            }

            $user->update();

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }
}
