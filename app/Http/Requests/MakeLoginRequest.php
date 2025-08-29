<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Admin;
/**
 * Handle a login request.
 * @property-read string $email
 * @property-read string $password
 */

class MakeLoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function tryToLogin(): bool{

        $usuario = Usuario::where('email', $this->input('email'))->first();

        if ($usuario && Hash::check($this->input('password'), $usuario->senha)) {
            Auth::login($usuario);
            return true;
        }

        $usuarioadmin = Admin::where('email', $this->input('email'))->first();

        if ($usuarioadmin && Hash::check($this->input('password'), $usuarioadmin->senha)) {
            Auth::login($usuarioadmin);
            return true;
        }

        return false;
    }
}
