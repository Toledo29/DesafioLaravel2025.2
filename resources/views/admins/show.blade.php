<div>
    <h1>Detalhes do Admin</h1>

    @if ($message = Session::get('menssagem'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
        <label for="nome">Nome: {{ $admin->nome }}</label>

        <label for="email">Email: {{ $admin->email }}</label>

        <label for="data_nascimento">Data de Nascimento: {{ $admin->data_nascimento }}</label>

        <label for="cpf">CPF: {{ $admin->cpf }}</label>

        <label for="foto">Foto: {{ $admin->foto }}</label>

        <label for="telefone">Telefone: {{ $admin->telefone }}</label>

        <label for="cep">Cep: {{ $admin->cep }}</label>

        <label for="logradouro">Logradouro: {{ $admin->logradouro }}</label>

        <label for="numero">Número: {{ $admin->numero }}</label>

        <label for="bairro">Bairro: {{ $admin->bairro }}</label>

        <label for="cidade">Cidade: {{ $admin->cidade }}</label>

        <label for="estado">Estado: {{ $admin->estado }}</label>

        <label for="complemento">Complemento: {{ $admin->complemento }}</label>

        <label for="criador">Criador: {{ $admin->criador ? $admin->criador->nome : 'não possui' }}</label>

        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar Admin</button>
        </form>
</div>
