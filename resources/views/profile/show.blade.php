@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Meu Perfil</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nome</label>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" 
                class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">E-mail</label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" 
                class="w-full p-2 border border-gray-300 rounded-lg" required disabled>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Nova Senha (opcional)</label>
            <input type="password" id="password" name="password" 
                class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar Nova Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" 
                class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Atualizar Perfil</button>
        </div>
    </form>
</div>
@endsection
