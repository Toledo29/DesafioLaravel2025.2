<div>

    <h1>Criar Produto</h1>

    @if ($message = Session::get('menssagem'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('produtos.create') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required>

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Selecione uma categoria</option>
            <option value="eletronicos">Eletrônicos</option>
            <option value="roupas">Roupas</option>
            <option value="moveis">Móveis</option>
        </select>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*">
        <button type="button">Upload</button>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <button type="submit">Criar Produto</button>
    </form>
</div>
