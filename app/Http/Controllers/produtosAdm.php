<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class produtosAdm extends Controller
{
    public function __invoke(){
        if(auth()->guard('web_admin')->check()){
            $produtos = Produto::all();
        }
        elseif(auth()->guard('web_usuario')->check()){
            $user = auth()->guard('web_usuario')->user();
            $produtos = Produto::where('usuario_id', $user->id)->get();
        }

        $chart_options = [
            'chart_title'   => 'Produtos Registrados por Mês',
            'model'         => Produto::class,
            'chart_type'    => 'bar',
            'report_type'  => 'group_by_date',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'filter_period' => 'year',
        ];

        $chart = new LaravelChart($chart_options);
        
        return view('produtos.produtosAdm' , compact('produtos', 'chart'));
    }
}
