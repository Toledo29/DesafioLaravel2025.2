<div>
    <h1>Detalhes do Usuário</h1>

    @if ($message = Session::get('menssagem'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
        <label for="nome">Nome: {{ $usuario->nome }}</label>

        <label for="email">Email: {{ $usuario->email }}</label>

        <label for="data_nascimento">Data de Nascimento: {{ $usuario->data_nascimento }}</label>

        <label for="cpf">CPF: {{ $usuario->cpf }}</label>

        <label for="saldo">Saldo: {{ $usuario->saldo }}</label>

        <label for="foto">Foto: {{ $usuario->foto }}</label>

        <label for="telefone">Telefone: {{ $usuario->telefone }}</label>

        <label for="cep">Cep: {{ $usuario->cep }}</label>

        <label for="logradouro">Logradouro: {{ $usuario->logradouro }}</label>

        <label for="numero">Número: {{ $usuario->numero }}</label>

        <label for="bairro">Bairro: {{ $usuario->bairro }}</label>

        <label for="cidade">Cidade: {{ $usuario->cidade }}</label>

        <label for="estado">Estado: {{ $usuario->estado }}</label>

        <label for="complemento">Complemento: {{ $usuario->complemento }}</label>

        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar Usuário</button>
        </form>
</div>
