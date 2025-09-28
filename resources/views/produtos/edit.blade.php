<div>
    <h1>Editar Produto {{ $produto->id }}</h1>

    @if ($message = Session::get('menssagem'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" required>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="{{ $produto->preco }}" required>

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" value="{{ $produto->categoria }}" required>
            <option value="">Selecione uma categoria</option>
            <option value="eletronicos" {{ $produto->categoria === 'eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
            <option value="roupas" {{ $produto->categoria === 'roupas' ? 'selected' : '' }}>Roupas</option>
            <option value="moveis" {{ $produto->categoria === 'moveis' ? 'selected' : '' }}>Móveis</option>
        </select>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}" required>

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*">
        <button type="button">Upload</button>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required>{{ $produto->descricao }}</textarea>

        <button type="submit">Atualizar Produto</button>
    </form>
</div>
