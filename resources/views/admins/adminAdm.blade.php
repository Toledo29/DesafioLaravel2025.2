<div>
    <h1>Admins</h1>

    <a href="{{ route('admins.create') }}">Criar</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->nome }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('admins.show', $admin) }}">Visualizar</a>
                        <a href="{{ route('admins.edit', $admin) }}">Editar</a>
                        <form action="{{ route('admins.destroy', $admin) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>