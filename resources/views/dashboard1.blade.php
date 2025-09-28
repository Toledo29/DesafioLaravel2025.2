<div>
    <h1>Dashboard 1</h1>
    <p>Welcome to Dashboard 1!</p>
    <p>User ID: {{ auth()->id() }}</p>
    <div>
        <a href="{{ route('produtos.produtosAdm') }}">Produtos</a>
        <a href="{{ route('vendas.vendasAdm') }}">Vendas</a>
        @if(auth('web_usuario')->check())
        <a href="{{ route('compras.comprasAdm') }}">Compras</a>
        <a href="{{ route('usuarios.show', auth()->id()) }}">Perfil</a>
        @endif
        @if(auth('web_admin')->check())
        <a href="{{ route('usuarios.usuariosAdm') }}">Usuarios</a>
        <a href="{{ route('admins.adminAdm') }}">Admins</a>
        <a href="{{ route('admins.email') }}">Email</a>
        @endif
        <a href="{{ route('logout') }}">Logout</a>
    </div>
    
    <br>
    <div>
        <form action="{{ route('dashboard1') }}" method="GET">
            <div>
                <input type="text" name="pesquisa" placeholder="Pesquisar produtos..." value="{{ request('pesquisa') }}"/>
            </div>
            <br>
            <div>
                <select name="categoria">
                    <option value="">Todas Categorias</option>
                    <option value="eletronicos" {{ request('categoria') == 'eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
                    <option value="roupas" {{ request('categoria') == 'roupas' ? 'selected' : '' }}>Roupas</option>
                    <option value="moveis" {{ request('categoria') == 'moveis' ? 'selected' : '' }}>Móveis</option>
                </select>
            </div>
            <br>
            <div>
                <button type="submit">Buscar</button>
            </div>
            <br>
            
        </form>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->categoria }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>
                        <a href="/produtos/{{ $produto->id }}/show">Visualizar</a>
                        @if(auth('web_usuario')->check())
                        <form action="/checkout" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="produto" value="{{json_encode($produto)}}">
                            <button type="submit">Comprar</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>