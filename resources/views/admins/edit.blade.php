<div>
    <h1>Editar Admin</h1>

    @if ($message = Session::get('menssagem'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $admin->nome }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $admin->email }}" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirme a Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $admin->data_nascimento }}" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="{{ $admin->cpf }}" required>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*">

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="{{ $admin->telefone }}" required>

        <label for="cep">Cep:</label>
        <input type="text" id="cep" name="cep" value="{{ $admin->cep }}" required>
        <button type="button" onclick="buscarEndereco()">Buscar</button>

        <label for="logradouro">Logradouro:</label>
        <input type="text" id="logradouro" name="logradouro" value="{{ $admin->logradouro }}" required>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" value="{{ $admin->numero }}" required>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" value="{{ $admin->bairro }}" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="{{ $admin->cidade }}" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="{{ $admin->estado }}" required>

        <label for="complemento">Complemento:</label>
        <input type="text" id="complemento" name="complemento" value="{{ $admin->complemento }}">

        <button type="submit">Editar Admin</button>
    </form>
</div>

<script>
    function buscarEndereco() {
        const cep = document.getElementById('cep').value;
        fetch(`/buscar-cep?cep=${cep}`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    alert(data.erro);
                    return;
                }
                document.getElementById('logradouro').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
                alert('Erro ao buscar CEP. Tente novamente.');
        });
    }
</script>
