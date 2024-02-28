<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'app_name' => 'required',
            'app_desc' => 'required',
            'auth_bg' => 'nullable',
            'report_logo' => 'nullable',
            'app_logo' => 'nullable',
        ];
    }
}
