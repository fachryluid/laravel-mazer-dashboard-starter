<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAuthenticateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'username' => 'required|string',
        'password' => 'required|string'
    ];
}

public function messages(): array
{
    return [
        'username.required' => 'Username wajib diisi.',
        'password.required' => 'Password wajib diisi.',
    ];
}

}
