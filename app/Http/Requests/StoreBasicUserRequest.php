<?php

namespace App\Http\Requests;

use App\Constants\UserGender;
use Illuminate\Foundation\Http\FormRequest;

class StoreBasicUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:32',
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/|min:4|max:32|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|max:14',
            'birthday' => 'nullable|date',
            'gender' => 'required|in:' . UserGender::MALE . ',' . UserGender::FEMALE
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            
            'username.required' => 'Username wajib diisi.',
            'username.regex' => 'Username hanya boleh terdiri dari huruf, angka, dan garis bawah.',
            'username.min' => 'Username minimal :min karakter.',
            'username.max' => 'Username tidak boleh lebih dari :max karakter.',
            'username.unique' => 'Username sudah terdaftar. Silakan pilih yang lain.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan yang lain.',

            'phone.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',

            'birthday.date' => 'Tanggal lahir harus merupakan format tanggal yang valid.',

            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin yang dipilih tidak valid.'
        ];
    }
}
