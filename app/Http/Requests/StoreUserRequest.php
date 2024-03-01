<?php

namespace App\Http\Requests;

use App\Constants\UserGender;
use App\Constants\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:32',
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|max:14',
            'date' => 'nullable|date',
            'gender' => 'nullable|in:'.UserGender::MALE.','.UserGender::FEMALE
        ];
    }
}
