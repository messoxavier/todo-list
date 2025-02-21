@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Lista de Tarefas</h1>
    
    <div class="text-right mb-4">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Adicionar Nova Tarefa</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border rounded-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Título</th>
                <th class="py-2 px-4 border">Status</th>
                <th class="py-2 px-4 border">Prazo</th>
                <th class="py-2 px-4 border">Prioridade</th>
                <th class="py-2 px-4 border text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $task->id }}</td>
                <td class="py-2 px-4">{{ $task->title }}</td>
                <td class="py-2 px-4">{{ $task->completed ? 'Concluída' : 'Pendente' }}</td>
                <td class="py-2 px-4">{{ $task->due_date ? date('d/m/Y', strtotime($task->due_date)) : 'Sem prazo' }}</td>
                <td class="py-2 px-4">
                    @php
                        $priorities = [1 => 'Baixa', 2 => 'Média', 3 => 'Alta'];
                        $colors = [1 => 'bg-green-500', 2 => 'bg-yellow-400', 3 => 'bg-red-500'];
                    @endphp
                    <span class="text-white px-2 py-1 rounded {{ isset($colors[$task->priority]) ? $colors[$task->priority] : 'default-class' }}">
                        {{ $task->priority = $task->priority ?? 1; }}
                    </span>
                </td>
                <td class="py-2 px-4 text-center">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700">Editar</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
