<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El titulo es requerido',
            'title.string' => 'El titulo debe de ser una cadena de caracteres',
            'title.max' => 'El titulo solo soporta hasta 255 caracteres',
            'content.required' => 'El contenido es requerido',
            'content.string' => 'El contenido debe de ser una cadena de caracteres',
            'user_id.required' => 'El user_id es requerido',
            'user_id.integer' => 'El user_id debe de ser un número entero'
        ];
    }
}
