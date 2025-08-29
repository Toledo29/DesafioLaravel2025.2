<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Admin;
use App\Http\Requests\MakeLoginRequest;

class LoginController extends Controller
{

    public function index(){
        return view('auth.login1');
    }

    public function login(MakeLoginRequest $request){

        if($request->tryToLogin()) {
             return dd('Usuário autenticado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }
}
