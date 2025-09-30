@extends('layouts.basic')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Editar Admin</h1>

    @if ($message = Session::get('menssagem'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex justify-center gap-4 mb-6">
        <a href="{{ route('admins.adminAdm') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">Logout</a>
    </div>

    <form action="{{ route('admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $admin->nome }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
            <input type="email" id="email" name="email" value="{{ $admin->email }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha:</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirme a Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="data_nascimento" class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $admin->data_nascimento }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="{{ $admin->cpf }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
            @if($admin->foto)
                <div class="mt-4 flex justify-center">
                    <img src="{{ asset('storage/' . $admin->foto) }}" alt="Foto atual" class="w-32 h-32 object-cover rounded border border-gray-300" />
                </div>
            @endif
        </div>
        <div>
            <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $admin->telefone }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div class="flex gap-2">
            <div class="flex-1">
                <label for="cep" class="block text-sm font-medium text-gray-700 mb-1">Cep:</label>
                <input type="text" id="cep" name="cep" value="{{ $admin->cep }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
            </div>
            <div class="flex items-end">
                <button type="button" onclick="buscarEndereco()" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">Buscar</button>
            </div>
        </div>
        <div>
            <label for="logradouro" class="block text-sm font-medium text-gray-700 mb-1">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" value="{{ $admin->logradouro }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="numero" class="block text-sm font-medium text-gray-700 mb-1">Número:</label>
            <input type="text" id="numero" name="numero" value="{{ $admin->numero }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="bairro" class="block text-sm font-medium text-gray-700 mb-1">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="{{ $admin->bairro }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="cidade" class="block text-sm font-medium text-gray-700 mb-1">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="{{ $admin->cidade }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado:</label>
            <input type="text" id="estado" name="estado" value="{{ $admin->estado }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="complemento" class="block text-sm font-medium text-gray-700 mb-1">Complemento:</label>
            <input type="text" id="complemento" name="complemento" value="{{ $admin->complemento }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div class="text-center pt-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded shadow hover:bg-indigo-700 transition">Editar Admin</button>
        </div>
    </form>
</div>

<script>
    function buscarEndereco() {
        const cep = document.getElementById('cep').value;
        fetch(`/buscar-cep?cep=${cep}`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    alert(data.erro);
                    return;
                }
                document.getElementById('logradouro').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
                alert('Erro ao buscar CEP. Tente novamente.');
        });
    }
</script>
@endsection