@extends('layouts.basic')
@section('content')
<div class="max-w-5xl mx-auto py-8">

    <h1 class="text-3xl font-bold text-center" >Dashboard 1</h1>
    <br>
    <div class="space-x-4 text-center">
        <a class="text-black-600 hover:underline" href="{{ route('produtos.produtosAdm') }}">Produtos</a>
        <a class="text-black-600 hover:underline" href="{{ route('vendas.vendasAdm') }}">Vendas</a>
        @if(auth('web_usuario')->check())
        <a class="text-black-600 hover:underline" href="{{ route('compras.comprasAdm') }}">Compras</a>
        <a class="text-black-600 hover:underline" href="{{ route('usuarios.show', auth()->id()) }}">Perfil</a>
        @endif
        @if(auth('web_admin')->check())
        <a class="text-black-600 hover:underline" href="{{ route('usuarios.usuariosAdm') }}">Usuarios</a>
        <a class="text-black-600 hover:underline" href="{{ route('admins.adminAdm') }}">Admins</a>
        <a class="text-black-600 hover:underline" href="{{ route('admins.email') }}">Email</a>
        @endif
        <a class="text-black-600 hover:underline" href="{{ route('logout') }}">Logout</a>
    </div>
    
    <br>
    <div class="flex align-center justify-center flex-col">
        <div>
            <form action="{{ route('dashboard1') }}" method="GET" class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex-1 mb-2 md:mb-0">
                    <input type="text" name="pesquisa" placeholder="Pesquisar produtos..." value="{{ request('pesquisa') }}" class="w-full border border-gray-400 rounded-md p-2"/>
            </div>
            <br>
            <div class="flex-1 mx-2">
                <select name="categoria" class="w-full border border-gray-400 rounded-md p-2">
                    <option value="">Todas Categorias</option>
                    <option value="eletronicos" {{ request('categoria') == 'eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
                    <option value="roupas" {{ request('categoria') == 'roupas' ? 'selected' : '' }}>Roupas</option>
                    <option value="moveis" {{ request('categoria') == 'moveis' ? 'selected' : '' }}>Móveis</option>
                </select>
            </div>
            <br>
            <div>
                <x-submit-button width='w-1/4'>Buscar</x-submit-button>
            </div>
            <br>
            
            </form>
        </div>
        <br>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium uppercase">Nome</th>
                        <th class="px-6 py-3 text-left font-medium uppercase">Preço</th>
                        <th class="px-6 py-3 text-left font-medium uppercase">Categoria</th>
                        <th class="px-6 py-3 text-left font-medium uppercase">Quantidade</th>
                        <th class="px-6 py-3 text-left font-medium uppercase">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr class="divide-y divide-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->preco }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->categoria }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produto->quantidade }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="/produtos/{{ $produto->id }}/show" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Visualizar</a>
                            @if(auth('web_usuario')->check())
                            <form action="/checkout" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="produto" value="{{json_encode($produto)}}">
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">Comprar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $produtos->links() }}
            </div>
        </div>
    </div>
</div>

@endsection