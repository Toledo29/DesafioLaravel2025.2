@extends('layouts.basic')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="rounded shadow p-8 max-w-md mx-auto bg-white mt-10">

    <h1 class="text-2xl font-bold text-center">Login</h1>

    <form action="/login1" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('email')
                <span>{{$message}}</span>
            @enderror    
        </div>
            <br>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Senha:</label>
            <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('password')
                <span>{{$message}}</span>
            @enderror
        </div>
        <br>
        <x-submit-button>Login</x-submit-button>

    </form>

    </div>
</div>
@endsection