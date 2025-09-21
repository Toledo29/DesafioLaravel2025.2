<div>
    <h1>Vendas</h1>

    <ul>
        @foreach ($vendas as $venda)
            <li>Produto: {{ $venda->produto->nome }} - Preço: ${{ $venda->preco }} - Data da Venda: {{ $venda->data_venda }}</li>
            <button>Gerar PDF</button>
        @endforeach
</div>
