<div>
    <h1>Produtos</h1>
    <br>
    <div>
        <a href="{{ route('dashboard1') }}">Voltar</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
    <br>
    @if(auth('web_usuario')->check())
        <a href="{{ route('produtos.create') }}">Criar</a>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                @if(auth('web_admin')->check())
                    <th>Usuário</th>
                @endif
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    @if(auth('web_admin')->check())
                        <td>{{ $produto->usuario->nome }}</td>
                    @endif
                    <td>
                        <a href="{{ route('produtos.show', $produto) }}">Visualizar</a>
                        <a href="{{ route('produtos.edit', $produto)}}">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(auth('web_admin')->check())
        {!! $chart->renderHtml() !!}
        {!! $chart->renderChartJsLibrary() !!}
        {!! $chart->renderJs() !!}
    @endif
</div>