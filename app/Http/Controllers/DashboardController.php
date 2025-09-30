<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class DashboardController extends Controller
{
    

    public function __invoke(Request $request)
    {
        if (auth()->guard('web_usuario')->check()) {
            $user = auth()->guard('web_usuario')->user();
            if($request->input('categoria') == ''){
                $produtos = Produto::where('usuario_id', '!=', $user->id)->where('nome', 'like', '%'.$request->input('pesquisa').'%')->paginate(10);
            }
            else{
                $produtos = Produto::where('usuario_id', '!=', $user->id)->where('nome', 'like', '%'.$request->input('pesquisa').'%')->where('categoria', $request->input('categoria'))->paginate(10);
            }

            return view('dashboard1', compact('produtos'));
        }
        elseif (auth()->guard('web_admin')->check()) {
            $admin = auth()->guard('web_admin')->user();
            if($request->input('categoria') == ''){
                $produtos = Produto::where('nome', 'like', '%'.$request->input('pesquisa').'%')->paginate(10);
            }
            else{
                $produtos = Produto::where('nome', 'like', '%'.$request->input('pesquisa').'%')->where('categoria', $request->input('categoria'))->paginate(10);
            }
            return view('dashboard1', compact('produtos'));
        }
        elseif (auth()->guard('web_admin')->check()) {
            $admin = auth()->guard('web_admin')->user();
            if($request->input('categoria') == ''){
                $produtos = Produto::where('nome', 'like', '%'.$request->input('pesquisa').'%')->paginate(10);
            }
            else{
                $produtos = Produto::where('nome', 'like', '%'.$request->input('pesquisa').'%')->where('categoria', $request->input('categoria'))->paginate(10);
            }
            return view('dashboard1', compact('produtos'));
        }
        return view('dashboard1');
    }
}
