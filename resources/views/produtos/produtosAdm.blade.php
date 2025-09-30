@extends('layouts.basic')
@section('content')
<div class="max-w-5xl mx-auto py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Produtos</h1>
    <div class="space-x-4 text-center mb-6">
        <a href="{{ route('dashboard1') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition inline-block">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition inline-block">Logout</a>
        @if(auth('web_usuario')->check())
            <a href="{{ route('produtos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition inline-block">Criar</a>
        @endif
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left font-medium uppercase">ID</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Nome</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Preço</th>
                    @if(auth('web_admin')->check())
                        <th class="px-6 py-3 text-left font-medium uppercase">Usuário</th>
                    @endif
                    <th class="px-6 py-3 text-left font-medium uppercase">Categoria</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Quantidade</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr class="divide-y divide-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        @if(auth('web_admin')->check())
                            <td class="px-6 py-4 whitespace-nowrap">{{ $produto->usuario->nome }}</td>
                        @endif
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->categoria }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->quantidade }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex flex-wrap gap-2">
                            <a href="{{ route('produtos.show', $produto) }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition min-w-[100px] flex items-center justify-center text-center">Visualizar</a>
                            <a href="{{ route('produtos.edit', $produto)}}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition min-w-[100px] flex items-center justify-center text-center">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition min-w-[100px] flex items-center justify-center text-center">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $produtos->links() }}
    </div>
    @if(auth('web_admin')->check())
        <div class="mt-8">
            {!! $chart->renderHtml() !!}
            {!! $chart->renderChartJsLibrary() !!}
            {!! $chart->renderJs() !!}
        </div>
    @endif
</div>
@endsection