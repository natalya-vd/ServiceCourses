<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($this->routeIs('auth.login')) {
            return [
                'login' => ['required', 'string'],
                'password' => ['required', 'string']
            ];
        }

        if ($this->routeIs('auth.register')) {
            return [
                'name' => ['required', 'min:3', 'max:100'],
                'login' => ['required', 'alpha_dash', 'unique:users,login'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => [
                    'required', 'string', 'confirmed',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                        ->symbols()
                ],
            ];
        }
    }

    /**
     * Объединение провалидированных данных с дополнительными при регистрации пользователя
     *
     * @return array
     */
    public function validatedDataRegister(): array
    {
        return array_merge(
            $this->validated(),
            [
                'role' => 'USER',
                'password' => Hash::make($this->validated()['password'])
            ]
        );
    }
}
