@extends('layouts.basic')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Editar Produto #{{ $produto->id }}</h1>

    @if ($message = Session::get('menssagem'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-center">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex justify-center gap-4 mb-6">
        <a href="{{ route('produtos.produtosAdm') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">Logout</a>
    </div>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="{{ $produto->preco }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1">Categoria:</label>
            <select id="categoria" name="categoria" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                <option value="">Selecione uma categoria</option>
                <option value="eletronicos" {{ $produto->categoria === 'eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
                <option value="roupas" {{ $produto->categoria === 'roupas' ? 'selected' : '' }}>Roupas</option>
                <option value="moveis" {{ $produto->categoria === 'moveis' ? 'selected' : '' }}>Móveis</option>
            </select>
        </div>
        <div>
            <label for="quantidade" class="block text-sm font-medium text-gray-700 mb-1">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="imagem" class="block text-sm font-medium text-gray-700 mb-1">Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" onchange="previewImagem(event)">
            <div class="mt-4 flex justify-center">
                @if($produto->foto)
                    <img id="imagem-preview" src="{{ asset('storage/' . $produto->foto) }}" alt="Imagem atual" class="w-32 h-32 object-cover rounded border border-gray-300" />
                @else
                    <img id="imagem-preview" src="#" alt="Pré-visualização da imagem" class="hidden w-32 h-32 object-cover rounded border border-gray-300" />
                @endif
            </div>
        </div>
        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição:</label>
            <textarea id="descricao" name="descricao" required rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">{{ $produto->descricao }}</textarea>
        </div>
        <input type="hidden" name="usuario_id" value="{{ $produto->usuario_id }}">
        <div class="text-center pt-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded shadow hover:bg-indigo-700 transition">Atualizar Produto</button>
        </div>
    </form>
</div>

<script>
function previewImagem(event) {
    const input = event.target;
    const preview = document.getElementById('imagem-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection