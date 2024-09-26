<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasicUserRequest;
use App\Http\Requests\UpdateBasicUserRequest;
use App\Models\BasicUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class BasicUserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = BasicUser::query();

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
                        <a href="' . route('dashboard.master.users.show', $row->uuid) . '" class="btn btn-primary btn-sm">
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

    public function store(StoreBasicUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $data['password'] = Hash::make($request->username);
            $user = User::create($data);
            BasicUser::create([
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

    public function show(BasicUser $basicUser)
    {
        return view('pages.dashboard.master.users.show', compact('basicUser'));
    }

    public function edit(BasicUser $basicUser)
    {
        return view('pages.dashboard.master.users.edit', compact('basicUser'));
    }

    public function update(UpdateBasicUserRequest $request, BasicUser $basicUser)
    {
        try {
            $data = $request->validated();
            $basicUser->user->update($data);

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

    public function destroy(BasicUser $basicUser)
    {
        try {
            $basicUser->user->delete();

            return redirect()
                ->route('dashboard.master.users.index')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()
                ->back()
                ->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }
}
