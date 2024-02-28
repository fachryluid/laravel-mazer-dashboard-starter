<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            $data->whereHas('admin');
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <a href="' . route('dashboard.admins.show', $row->uuid) . '" class="btn btn-primary btn-sm">
                            <i class="bi bi-list-ul"></i>
                            Detail
                        </a> 
                        ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.dashboard.master.admins.index');
    }

    public function create()
    {
        return view('pages.dashboard.master.admins.create');
    }

    public function store(StoreAdminRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'password' => Hash::make($request->username)
            ]);

            Admin::create([
                'user_id' => $user->id
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function show(User $user)
    {
        return view('pages.dashboard.master.admins.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.dashboard.master.admins.edit', compact('user'));
    }

    public function update(UpdateAdminRequest $request, User $user)
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
        try {
            if (Admin::count() === 1) {
                throw new \Error('Anda tidak dapat menghapus data terakhir.');
            }
    
            $user->delete();
    
            return redirect()->route('dashboard.admins.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}
