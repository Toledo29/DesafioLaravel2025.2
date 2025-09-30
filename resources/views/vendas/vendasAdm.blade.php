@extends('layouts.basic')
@section('content')
<div class="max-w-5xl mx-auto py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Vendas</h1>
    <div class="space-x-4 text-center mb-6">
        <a href="{{ route('dashboard1') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition inline-block">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition inline-block">Logout</a>
        <button onclick="window.location='{{ route('vendas.vendasPdf') }}'" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition inline-block">Gerar PDF</button>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left font-medium uppercase">Produto</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Preço</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Data da Venda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    <tr class="divide-y divide-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $venda->produto->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($venda->preco, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $venda->data_venda }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $vendas->links() }}
    </div>
    @if(auth()->guard('web_usuario')->check())
        <div class="mt-8">
            {!! $chart->renderHtml() !!}
            {!! $chart->renderChartJsLibrary() !!}
            {!! $chart->renderJs() !!}
        </div>
    @endif
</div>
@endsection