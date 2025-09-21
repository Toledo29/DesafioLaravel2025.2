<div>
    <h1>Produto {{ $produto->nome }}</h1>
    <p>Preço: ${{ $produto->preco }}</p>
    <p>Descrição: {{ $produto->descricao }}</p>
    <p>Categoria: {{ $produto->categoria }}</p>
    <p>Quantidade em estoque: {{ $produto->quantidade }}</p>
    @if($produto->imagem)
        <div>
            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" style="max-width: 300px;">
        </div>
    @endif
        <p>Vendido por: {{ $produto->usuario->nome }}</p>
        <p>Telefone: {{ $produto->usuario->telefone }}</p>
    @if(auth('web_usuario')->check() and $produto->quantidade > 0 and auth('web_usuario')->id() != $produto->usuario_id)
        <button>Comprar</button>
    @endif
    <br>    
    <a href="{{ route('dashboard1') }}">Voltar para a lista de produtos</a>
</div>
