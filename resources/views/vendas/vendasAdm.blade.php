<div>
    <h1>Vendas</h1>
    <button onclick="window.location='{{ route('vendas.pdf') }}'">Gerar PDF</button>
    <ul>
        @foreach ($vendas as $venda)
            <li>Produto: {{ $venda->produto->nome }} - Preço: ${{ $venda->preco }} - Data da Venda: {{ $venda->data_venda }}</li>
            
        @endforeach
    </ul>
</div>