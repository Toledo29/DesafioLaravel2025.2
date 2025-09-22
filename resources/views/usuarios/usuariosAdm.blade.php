<div>
    <h1>Usuários</h1>

    <a href="{{ route('usuarios.create') }}">Criar</a>

    <ul>
        @foreach ($usuarios as $usuario)
            <li>{{ $usuario->id }} {{ $usuario->nome }} -{{ $usuario->email }}
                <a href="{{ route('usuarios.show', $usuario) }}">Visualizar</a>
                <a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                </form>
            </li>
        @endforeach 
    </ul>
    
</div>
