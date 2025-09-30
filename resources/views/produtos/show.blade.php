@extends('layouts.basic')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <div class="flex justify-center gap-4 mb-6">
        <a href="{{ route('produtos.produtosAdm') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">Logout</a>
    </div>
    <div class="bg-white rounded shadow p-6 space-y-4">
        <h1 class="text-2xl font-bold text-center mb-4">Produto {{ $produto->nome }}</h1>
        <div class="flex flex-col items-center mb-4">
            @if($produto->imagem)
                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" class="w-64 h-64 object-cover rounded border border-gray-300 mb-2" />
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Preço:</label>
                <p class="text-gray-900">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Categoria:</label>
                <p class="text-gray-900">{{ $produto->categoria }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Quantidade em estoque:</label>
                <p class="text-gray-900">{{ $produto->quantidade }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Descrição:</label>
                <p class="text-gray-900">{{ $produto->descricao }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Vendido por:</label>
                <p class="text-gray-900">{{ $produto->usuario->nome }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Telefone do vendedor:</label>
                <p class="text-gray-900">{{ $produto->usuario->telefone }}</p>
            </div>
        </div>
        @if(auth('web_usuario')->check() && $produto->quantidade > 0 && auth('web_usuario')->id() != $produto->usuario_id)
            <form action="{{ route('checkout') }}" method="POST" class="mt-6 text-center">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded shadow hover:bg-green-700 transition">Comprar</button>
            </form>
        @endif
        <div class="flex justify-center mt-6">
            <a href="{{ route('dashboard1') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar para a lista de produtos</a>
        </div>
    </div>
</div>
@endsection