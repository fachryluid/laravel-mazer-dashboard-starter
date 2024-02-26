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
}
