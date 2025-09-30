@extends('layouts.basic')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Detalhes do Admin</h1>

    @if ($message = Session::get('menssagem'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-center">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex justify-center gap-4 mb-6">
        <a href="{{ route('admins.adminAdm') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">Logout</a>
    </div>

    <div class="bg-white rounded shadow p-6 space-y-4">
        <div class="flex flex-col items-center mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto:</label>
            <img src="{{ asset('storage/' . $admin->foto) }}" alt="Foto do admin" class="w-32 h-32 object-cover rounded border border-gray-300" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nome:</label>
                <p class="text-gray-900">{{ $admin->nome }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <p class="text-gray-900">{{ $admin->email }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Data de Nascimento:</label>
                <p class="text-gray-900">{{ $admin->data_nascimento }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">CPF:</label>
                <p class="text-gray-900">{{ $admin->cpf }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Telefone:</label>
                <p class="text-gray-900">{{ $admin->telefone }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Cep:</label>
                <p class="text-gray-900">{{ $admin->cep }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Logradouro:</label>
                <p class="text-gray-900">{{ $admin->logradouro }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Número:</label>
                <p class="text-gray-900">{{ $admin->numero }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Bairro:</label>
                <p class="text-gray-900">{{ $admin->bairro }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Cidade:</label>
                <p class="text-gray-900">{{ $admin->cidade }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Estado:</label>
                <p class="text-gray-900">{{ $admin->estado }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Complemento:</label>
                <p class="text-gray-900">{{ $admin->complemento }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Criador:</label>
                <p class="text-gray-900">{{ $admin->criador ? $admin->criador->nome : 'não possui' }}</p>
            </div>
        </div>
        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="mt-6 text-center">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este admin?')" class="bg-red-600 text-white px-6 py-2 rounded shadow hover:bg-red-700 transition">Deletar Admin</button>
        </form>
    </div>
</div>
@endsection