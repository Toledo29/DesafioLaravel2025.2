<div>
    <h1>Dashboard 1</h1>
    <p>Welcome to Dashboard 1!</p>
    <p>User ID: {{ auth()->id() }}</p>
    <ul>
        @foreach ($produtos as $produto)
            <li>{{ $produto->nome }} -${{ $produto->preco }} - <button>Comprar</button> </li>
        @endforeach 
    </ul>
</div>
