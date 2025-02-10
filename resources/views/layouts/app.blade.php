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
        <div class="container mx-auto flex justify-between">
            <a class="font-bold" href="{{ route('tasks.index') }}">To-Do List</a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-700">Sair</button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>
