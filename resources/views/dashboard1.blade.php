<div>
    <h1>Dashboard 1</h1>
    <p>Welcome to Dashboard 1!</p>
    <p>User ID: {{ auth()->id() }}</p>
    <div >
        <form action="{{ route('dashboard1') }}" method="GET">
            <div>
                <input type="text" name="pesquisa" placeholder="Pesquisar produtos..." value="{{ request('pesquisa') }}"/>
            </div>
            <div>
                <button type="submit">Buscar</button>
            </div>
            <div>
                <select name="categoria">
                    <option value="">Todas Categorias</option>
                    <option value="eletronicos" {{ request('categoria') == 'eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
                    <option value="roupas" {{ request('categoria') == 'roupas' ? 'selected' : '' }}>Roupas</option>
                    <option value="moveis" {{ request('categoria') == 'moveis' ? 'selected' : '' }}>Móveis</option>
                </select>
            </div>
        </form>
    </div>

    <ul>
        @foreach ($produtos as $produto)
            <li>{{ $produto->nome }} -${{ $produto->preco }}
                <a href="/produtos/{{ $produto->id }}/show">Visualizar</a>
                @if(auth('web_usuario')->check())
                <form action="/checkout" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="produtos" value="{{json_encode($produto)}}">
                    <button type="submit">Comprar</button>
                </form>
                @endif
            </li>
        @endforeach 
    </ul>
</div>
