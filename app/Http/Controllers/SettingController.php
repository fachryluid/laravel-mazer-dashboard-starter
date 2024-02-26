<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', 1)->first();

        return view('pages.dashboard.settings.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        try {
            $setting = Setting::where('id', 1)->first();

            if ($request->hasFile('auth_bg')) {
                Storage::delete('public/uploads/settings/' . $setting->auth_bg);
                $setting->auth_bg = basename($request->file('auth_bg')->store('public/uploads/settings'));
            }

            $setting->app_name = $request->app_name;
            $setting->app_desc = $request->app_desc;
            $setting->update();
            
            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}
