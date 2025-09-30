@extends('layouts.basic')
@section('content')
<div class="max-w-lg mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Enviar Email</h1>
    <div class="flex justify-center mb-4">
    <a href="{{ route('dashboard1') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 transition inline-block">Voltar</a>
    </div>
    <form action="{{ route('admins.sendEmail') }}" method="POST" class="bg-white rounded shadow p-6 space-y-4">
        @csrf
        <div>
            <label for="to" class="block text-sm font-medium text-gray-700 mb-1">Para:</label>
            <input type="email" id="to" name="to" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="email@exemplo.com">
        </div>
        <div>
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Assunto:</label>
            <input type="text" id="subject" name="subject" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Assunto do email">
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Mensagem:</label>
            <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" placeholder="Digite sua mensagem"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded shadow hover:bg-indigo-700 transition">Enviar</button>
        </div>
    </form>
</div>
@endsection