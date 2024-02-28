<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    public function loadFileAuthBg()
    {
        $setting = Setting::where('id', 1)->first();

        $filePath = 'storage/uploads/settings/' . $setting->auth_bg;
        $fileContent = file_get_contents($filePath);
        $mimeType = mime_content_type($filePath);

        return response($fileContent)
            ->header('Content-Type', $mimeType);
    }

    public function loadFileReportLogo()
    {
        $setting = Setting::where('id', 1)->first();

        $filePath = 'storage/uploads/settings/' . $setting->report_logo;
        $fileContent = file_get_contents($filePath);
        $mimeType = mime_content_type($filePath);

        return response($fileContent)
            ->header('Content-Type', $mimeType);
    }

    public function loadFileAppLogo()
    {
        $setting = Setting::where('id', 1)->first();

        $filePath = 'storage/uploads/settings/' . $setting->app_logo;
        $fileContent = file_get_contents($filePath);
        $mimeType = mime_content_type($filePath);

        return response($fileContent)
            ->header('Content-Type', $mimeType);
    }
}
