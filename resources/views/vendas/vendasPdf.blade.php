<div>
    <h1>Histórico de Vendas</h1>
    <br>
    <ul>
        @foreach ($vendas as $venda)
            <li>Data da Venda: {{ $venda->data_venda }} - Valor: ${{ $venda->preco }} - Comprador: {{ $venda->comprador->nome }} - Vendedor: {{ $venda->vendedor->nome }}</li>
        @endforeach
    </ul>
</div>
