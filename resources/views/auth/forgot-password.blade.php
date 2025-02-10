@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700">Recuperar Senha</h2>

        @if (session('status'))
            <div class="bg-green-500 text-white p-2 rounded mt-3">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-600">E-mail</label>
                <input type="email" name="email" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg mt-4 hover:bg-blue-600 transition">
                Enviar Link de Recuperação
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Lembrou sua senha? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Entrar</a>
        </p>
    </div>
</div>
@endsection
