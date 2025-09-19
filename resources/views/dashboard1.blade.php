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
        </form>
    </div>

    <ul>
        @foreach ($produtos as $produto)
            <li>{{ $produto->nome }} -${{ $produto->preco }} - <button>Comprar</button> </li>
        @endforeach 
    </ul>
</div>
