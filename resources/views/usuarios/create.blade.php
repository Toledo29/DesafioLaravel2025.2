@extends('layouts.basic')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Criar Usuário</h1>

    @if ($message = Session::get('menssagem'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex justify-center gap-4 mb-6">
        <a href="{{ route('usuarios.usuariosAdm') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">Logout</a>
    </div>

    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6 space-y-4">
        @csrf
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome:</label>
            <input type="text" id="nome" name="nome" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha:</label>
            <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirme a Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="data_nascimento" class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF:</label>
            <input type="text" id="cpf" name="cpf" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="saldo" class="block text-sm font-medium text-gray-700 mb-1">Saldo:</label>
            <input type="text" id="saldo" name="saldo" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" onchange="previewFoto(event)">
            <div class="mt-4 flex justify-center">
                <img id="foto-preview" src="#" alt="Pré-visualização da foto" class="hidden w-32 h-32 object-cover rounded border border-gray-300" />
            </div>
        </div>
        <div>
            <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div class="flex gap-2">
            <div class="flex-1">
                <label for="cep" class="block text-sm font-medium text-gray-700 mb-1">Cep:</label>
                <input type="text" id="cep" name="cep" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
            </div>
            <div class="flex items-end">
                <button type="button" onclick="buscarEndereco()" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">Buscar</button>
            </div>
        </div>
        <div>
            <label for="logradouro" class="block text-sm font-medium text-gray-700 mb-1">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="numero" class="block text-sm font-medium text-gray-700 mb-1">Número:</label>
            <input type="text" id="numero" name="numero" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="bairro" class="block text-sm font-medium text-gray-700 mb-1">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="cidade" class="block text-sm font-medium text-gray-700 mb-1">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado:</label>
            <input type="text" id="estado" name="estado" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="complemento" class="block text-sm font-medium text-gray-700 mb-1">Complemento:</label>
            <input type="text" id="complemento" name="complemento" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div class="text-center pt-2">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded shadow hover:bg-green-700 transition">Criar Usuário</button>
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

    function previewFoto(event) {
        const input = event.target;
        const preview = document.getElementById('foto-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    }
</script>
@endsection