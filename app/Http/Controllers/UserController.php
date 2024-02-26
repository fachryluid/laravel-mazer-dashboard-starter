<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)

    {
        // $users = User::all();

        // return view('pages.dashboard.master.users.index', compact('users'));
        return $dataTable->render('pages.dashboard.master.users.index');
    }
}
