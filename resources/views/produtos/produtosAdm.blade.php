<div>
    <h1>Produtos</h1>
    
    @if(auth('web_usuario')->check())
        <a href="{{ route('produtos.create') }}">Criar</a>
    @endif
    <ul>
        @foreach ($produtos as $produto)
            <li>{{ $produto->nome }} -${{ $produto->preco }}
                @if(auth('web_admin')->check())
                 - {{ $produto->usuario->nome }}
                @endif
                <a href="{{ route('produtos.show', $produto) }}">Visualizar</a>
                <a href="{{ route('produtos.edit', $produto)}}">Editar</a>
                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                </form>
            </li>
        @endforeach 
    </ul>
</div>
