<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class DashboardController extends Controller
{
    

    public function __invoke()
    {
        if (auth()->guard('web_usuario')->check()) {
            $user = auth()->guard('web_usuario')->user();
            $produtos = Produto::where('usuario_id', '!=', $user->id)->get();
            return view('dashboard1', compact('produtos'));
        }
        elseif (auth()->guard('web_admin')->check()) {
            $admin = auth()->guard('web_admin')->user();
            $produtos = Produto::all();
            return view('dashboard1', compact('produtos'));
        }
        return view('dashboard1');
    }
}
