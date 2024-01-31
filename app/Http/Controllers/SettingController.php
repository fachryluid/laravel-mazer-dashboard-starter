<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.settings.index');;
    }

    public function update(UpdateSettingRequest $request)
    {
        
    }
}
