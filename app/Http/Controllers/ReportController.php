<?php

namespace App\Http\Controllers;

use App\Constants\UserRole;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    private function applyFilterUsers($query, Request $request)
    {
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('role')) {
            $roles = [
                UserRole::MANAGER => 'manager',
                UserRole::ADMIN => 'admin',
                UserRole::USER => 'basic_user',
            ];

            if (array_key_exists($request->role, $roles)) {
                $query->whereHas($roles[$request->role]);
            }
        }
    }

    public function users(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query();
            $this->applyFilterUsers($query, $request);
            $data = $query->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.dashboard.reports.users');
    }

    public function users_pdf_preview(Request $request)
    {
        $query = User::query();
        $this->applyFilterUsers($query, $request);
        $users = $query->latest()->get();

        $Pdf = Pdf::loadView('exports.users', compact('users'));

        return $Pdf->stream('Laporan Pengguna ' . time() . '.pdf');
    }

    public function users_pdf_download(Request $request)
    {
        $query = User::query();
        $this->applyFilterUsers($query, $request);
        $users = $query->latest()->get();

        $Pdf = Pdf::loadView('exports.users', compact('users'));

        return $Pdf->download('Laporan Pengguna ' . time() . '.pdf');
    }
}
