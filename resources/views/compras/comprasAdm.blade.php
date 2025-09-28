<div>
    <h1>Compras</h1>
    <br>
    <div>
        <a href="{{ route('dashboard1') }}">Voltar</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
    <br>
    <button onclick="window.location='{{ route('compras.pdf') }}'">Gerar PDF</button>
    <ul>
        @foreach ($compras as $compra)
            <li>Produto: {{ $compra->produto->nome }} - Preço: ${{ $compra->preco }} - Data da Compra: {{ $compra->data_compra }}</li>
        @endforeach
    </ul>
</div>