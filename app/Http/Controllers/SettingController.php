<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Setting::class);

        $setting = Setting::where('id', 1)->first();

        return view('pages.dashboard.settings.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        try {
            $setting = Setting::where('id', 1)->first();

            if ($request->hasFile('auth_bg')) {
                Storage::delete('public/settings/' . $setting->auth_bg);
                $setting->auth_bg = basename($request->file('auth_bg')->store('public/settings'));
            }

            if ($request->hasFile('report_logo')) {
                Storage::delete('public/settings/' . $setting->report_logo);
                $setting->report_logo = basename($request->file('report_logo')->store('public/settings'));
            }

            if ($request->hasFile('app_logo')) {
                Storage::delete('public/settings/' . $setting->app_logo);
                $setting->app_logo = basename($request->file('app_logo')->store('public/settings'));
            }

            $setting->app_name = $request->app_name;
            $setting->app_desc = $request->app_desc;
            $setting->report_header = $request->report_header;
            $setting->update();

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
