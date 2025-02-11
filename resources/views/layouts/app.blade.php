<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gerenciador de Tarefas')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-blue-600 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a class="font-bold text-lg" href="{{ route('tasks.index') }}">To-Do List</a>
        @auth
            <div class="flex items-center gap-4">
                <a href="{{ route('profile.show') }}" class="bg-gray-200 text-blue-600 px-4 py-2 rounded hover:bg-gray-300">
                    Meu Perfil
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-700">Sair</button>
                </form>
            </div>
        @endauth
    </div>
</nav>

    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>
