<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
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
            'foto' => 'sometimes|string|max:255',
            'nome' => 'sometimes|string|max:255',
            'preco' => 'sometimes|numeric|min:0',
            'descricao' => 'sometimes|string',
            'quantidade' => 'sometimes|integer|min:0',
            'categoria' => 'sometimes|string|max:255',
        ];
    }
}
