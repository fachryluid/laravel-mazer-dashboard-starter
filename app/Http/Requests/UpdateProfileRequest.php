<?php

namespace App\Http\Requests;

use App\Constants\UserGender;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:32',
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/|min:4|max:32|unique:users,username,' . auth()->user()->id,
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone' => 'required|max:14',
            'birthday' => 'required|date',
            'gender' => 'required|in:' . UserGender::MALE . ',' . UserGender::FEMALE
        ];
    }
}
