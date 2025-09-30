@extends('layouts.basic')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Criar Produto</h1>

    @if ($message = Session::get('menssagem'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-center">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex justify-center gap-4 mb-6">
        <a href="{{ route('produtos.produtosAdm') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">Logout</a>
    </div>

    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6 space-y-4">
        @csrf
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome:</label>
            <input type="text" id="nome" name="nome" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Nome do produto">
        </div>
        <div>
            <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Preço">
        </div>
        <div>
            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Categoria">
        </div>
        <div>
            <label for="quantidade" class="block text-sm font-medium text-gray-700 mb-1">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Quantidade">
        </div>
        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Descrição do produto"></textarea>
        </div>
        <div>
            <label for="imagem" class="block text-sm font-medium text-gray-700 mb-1">Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" onchange="previewImagem(event)">
            <div class="mt-4 flex justify-center">
                <img id="imagem-preview" src="#" alt="Pré-visualização da imagem" class="hidden w-32 h-32 object-cover rounded border border-gray-300" />
            </div>
        </div>
        <div class="text-center pt-2">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded shadow hover:bg-green-700 transition">Criar Produto</button>
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
    } else {
        preview.src = '#';
        preview.classList.add('hidden');
    }
}
</script>
@endsection