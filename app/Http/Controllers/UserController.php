<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            $data->whereDoesntHave('admin');
            $data->whereDoesntHave('manager');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <a href="' . route('dashboard.master.user.show', $row->uuid) . '" class="btn btn-primary btn-sm">
                            <i class="bi bi-list-ul"></i>
                            Detail
                        </a> 
                        ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.dashboard.master.users.index');
    }

    public function create()
    {
        return view('pages.dashboard.master.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'password' => Hash::make($request->username)
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function show(User $user)
    {
        return view('pages.dashboard.master.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.dashboard.master.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
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

    public function update_password(UpdateUserPasswordRequest $request, User $user)
    {
        try {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.master.user.index')->with('success', 'Data berhasil dihapus');
    }
}
