<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'telefone' => 'required|string|max:20',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|string|max:14|unique:usuarios,cpf',
            'saldo' => 'nullable|numeric|min:0',
            'foto' => 'nullable|image|max:2048',
            'cep' => 'required|string|max:10',
            'numero' => 'required|integer|min:1',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'senha' => 'required|string|min:8|confirmed',
        ];
    }
}
