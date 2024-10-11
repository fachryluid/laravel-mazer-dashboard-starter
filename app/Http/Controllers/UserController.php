<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update_password(UpdateUserPasswordRequest $request, User $user)
    {
        $this->authorize('updatePassword', $user);

        try {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()
                ->back()
                ->with('success', 'Password berhasil diperbarui.');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }
}
