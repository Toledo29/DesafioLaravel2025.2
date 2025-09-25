<div>
    <h1>Histórico de Compras</h1>
    <br>
    <ul>
        @foreach ($compras as $compra)
            <li>Data da Compra: {{ $compra->data_compra }} - Valor: ${{ $compra->preco }} - Comprador: {{ $compra->comprador->nome }} - Vendedor: {{ $compra->vendedor->nome }}</li>
        @endforeach
    </ul>
</div>
