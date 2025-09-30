<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class vendasAdm extends Controller
{
    public function __invoke(){
        if(auth()->guard('web_admin')->check()){
            $vendas = Venda::paginate(10);
            return view('vendas.vendasAdm' , compact('vendas'));
        }
        elseif(auth()->guard('web_usuario')->check()){
            $user = auth()->guard('web_usuario')->user();
            $vendas = Venda::where('vendedor_id', $user->id)->paginate(10);
            $chart_options = [
            'chart_title'   => 'Vendas Realizadas por Mês',
            'model'         => Venda::class,
            'chart_type'    => 'line',
            'report_type'  => 'group_by_date',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'where_raw'       => 'vendedor_id = ' . $user->id,
            'filter_period' => 'year',
        ];
        $chart = new LaravelChart($chart_options);
        return view('vendas.vendasAdm' , compact('vendas', 'chart'));
        }
    }
}
