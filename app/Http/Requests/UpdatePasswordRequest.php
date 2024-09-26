<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old_password' => 'required|current_password',
            'new_password' => [
                'required',
                'string',
                'min:8',             // Minimal 8 karakter
                'regex:/[a-z]/',      // Harus ada huruf kecil
                'regex:/[A-Z]/',      // Harus ada huruf besar
                'regex:/[0-9]/',      // Harus ada angka
                'regex:/[@$!%*?&]/',  // Harus ada karakter spesial
            ],
            'confirm_password' => 'required|same:new_password'
        ];
    }

    public function messages(): array
    {
        return [
            'old_password.required' => 'Password lama wajib diisi.',
            'old_password.current_password' => 'Password lama tidak sesuai.',

            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.string' => 'Password baru harus berupa teks.',
            'new_password.min' => 'Password baru harus minimal :min karakter.',
            'new_password.regex' => 'Password baru harus mengandung huruf kecil, huruf besar, angka, dan karakter spesial (@$!%*?&).',

            'confirm_password.required' => 'Konfirmasi password wajib diisi.',
            'confirm_password.same' => 'Konfirmasi password tidak cocok dengan password baru.',
        ];
    }
}
