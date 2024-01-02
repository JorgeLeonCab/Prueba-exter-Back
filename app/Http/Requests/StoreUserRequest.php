<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|max:255',
            'password' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe de ser una cadena de caracteres',
            'name.max' => 'El nombre solo soporta hasta 255 caracteres',
            'email.required' => 'El correo electronico es requerido',
            'email.string' => 'El correo electronico debe de ser una cadena de caracteres',
            'email.unique' => 'El correo electronico ya se encuentra en uso',
            'email.max' => 'El correo electronico solo soporta hasta 255 caracteres',
            'password.required' => 'La contraseña es requerido',
            'password.string' => 'La contraseña debe de ser una cadena de caracteres',
            'password.max' => 'La contraseña solo soporta hasta 255 caracteres',
        ];
    }
}
