@extends('layouts.basic')
@section('content')
<div class="max-w-5xl mx-auto py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Relatório de Vendas (PDF)</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left font-medium uppercase">Produto</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Preço</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Data da Venda</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Comprador</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    <tr class="divide-y divide-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $venda->produto->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($venda->preco, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $venda->data_venda }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $venda->comprador->nome ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection