<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postCommentsRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
            'content' => 'required|string',
        ];
    }

    public function message(): array
    {
        return [
            'user_id.required' => 'El user_id es requerido',
            'user_id.integer' => 'El user_id debe de ser un número entero',
            'post_id.required' => 'El post_id es requerido',
            'post_id.integer' => 'El post_id debe de ser un número entero',
            'content.required' => 'El contenido es requerido',
            'content.string' => 'El contenido debe de ser una cadena de caracteres',
        ];
    }
}
