@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700">Entrar</h2>

        @if (session('status'))
            <div class="bg-red-500 text-white p-2 rounded mt-3">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-600">E-mail</label>
                <input type="email" name="email" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-600">Senha</label>
                <input type="password" name="password" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div class="mt-4 flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="text-blue-500">
                    <span class="ml-2 text-sm text-gray-600">Lembrar-me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg mt-4 hover:bg-blue-600 transition">Entrar</button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Ainda não tem conta? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Cadastre-se</a>
        </p>
    </div>
</div>
@endsection
