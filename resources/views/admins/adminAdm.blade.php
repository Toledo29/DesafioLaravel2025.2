@extends('layouts.basic')
@section('content')
<div class="max-w-5xl mx-auto py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Admins</h1>
    <div class="space-x-4 text-center mb-6">
        <a href="{{ route('dashboard1') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition inline-block">Voltar</a>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition inline-block">Logout</a>
        <a href="{{ route('admins.create') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition inline-block">Criar</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left font-medium uppercase">ID</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Nome</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Email</th>
                    <th class="px-6 py-3 text-left font-medium uppercase">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr class="divide-y divide-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $admin->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $admin->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $admin->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex flex-wrap gap-2">
                            <a href="{{ route('admins.show', $admin) }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition min-w-[100px] flex items-center justify-center text-center">Visualizar</a>
                            <a href="{{ route('admins.edit', $admin) }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition min-w-[100px] flex items-center justify-center text-center">Editar</a>
                            <form action="{{ route('admins.destroy', $admin) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este admin?')" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition min-w-[100px] flex items-center justify-center text-center">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        <div class="mt-4">
            {{ $admins->links() }}
        </div>
    </div>
</div>
@endsection