<div>
    <h1>Admins</h1>

    <a href="{{ route('admins.create') }}">Criar</a>

    <ul>
        @foreach ($admins as $admin)
            <li>{{ $admin->id }} {{ $admin->nome }} -{{ $admin->email }}
                <a href="{{ route('admins.show', $admin) }}">Visualizar</a>
                <a href="{{ route('admins.edit', $admin) }}">Editar</a>
                <form action="{{ route('admins.destroy', $admin) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                </form>
            </li>
        @endforeach 
    </ul>
    
</div>
