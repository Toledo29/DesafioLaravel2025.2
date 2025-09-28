<div>
    <h1>Editar Usuário</h1>

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
    <br>
    <div>
        @if(auth('web_usuario')->check())
        <a href="{{ route('dashboard1') }}">Voltar</a>
        @endif
        @if(auth('web_usuario')->check())
        <a href="{{ route('usuarios.usuariosAdm') }}">Voltar</a>
        @endif
        <a href="{{ route('logout') }}">Logout</a>
    </div>
    <br>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $usuario->nome }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $usuario->email }}" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirme a Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $usuario->data_nascimento }}" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="{{ $usuario->cpf }}" required>

        <label for="saldo">Saldo:</label>
        <input type="text" id="saldo" name="saldo" value="{{ $usuario->saldo }}" required>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*">

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="{{ $usuario->telefone }}" required>

        <label for="cep">Cep:</label>
        <input type="text" id="cep" name="cep" value="{{ $usuario->cep }}" required>
        <button type="button" onclick="buscarEndereco()">Buscar</button>

        <label for="logradouro">Logradouro:</label>
        <input type="text" id="logradouro" name="logradouro" value="{{ $usuario->logradouro }}" required>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" value="{{ $usuario->numero }}" required>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" value="{{ $usuario->bairro }}" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="{{ $usuario->cidade }}" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="{{ $usuario->estado }}" required>

        <label for="complemento">Complemento:</label>
        <input type="text" id="complemento" name="complemento" value="{{ $usuario->complemento }}">

        <button type="submit">Editar Usuário</button>
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
