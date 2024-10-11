<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Admin::class, 'admin');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Admin::query();

            if (isset($request->gender)) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('gender', $request->gender);
                });
            }

            $data = $query->with('user')->latest()->get();

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
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $data['password'] = Hash::make($request->username);
            $user = User::create($data);
            Admin::create([
                'user_id' => $user->id
            ]);

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }

    public function show(Admin $admin)
    {
        return view('pages.dashboard.master.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('pages.dashboard.master.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        try {
            $data = $request->validated();
            $admin->user->update($data);

            return redirect()
                ->back()
                ->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }

    public function destroy(Admin $admin)
    {
        try {
            if (Admin::count() === 1) {
                throw new \Exception('Tidak dapat menghapus Admin terakhir.');
            }

            $admin->user->delete();

            return redirect()->route('dashboard.admins.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }
}
