<div>
    <h1>Vendas</h1>
    <button onclick="window.location='{{ route('vendas.vendasPdf') }}'">Gerar PDF</button>
    <ul>
        @foreach ($vendas as $venda)
            <li>Produto: {{ $venda->produto->nome }} - Preço: ${{ $venda->preco }} - Data da Venda: {{ $venda->data_venda }}</li>
            
        @endforeach
    </ul>

    @if(auth()->guard('web_usuario')->check())
        <div>
        {!! $chart->renderHtml() !!}
        {!! $chart->renderChartJsLibrary() !!}
        {!! $chart->renderJs() !!}
        </div>
    @endif
</div>
