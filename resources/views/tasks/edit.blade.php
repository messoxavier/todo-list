@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Editar Tarefa</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold">Título</label>
            <input type="text" name="title" id="title" class="w-full border p-2 rounded" value="{{ $task->title }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold">Descrição</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded">{{ $task->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="due_date" class="block text-gray-700 font-bold mb-2">Prazo</label>
            <input type="date" name="due_date" id="due_date" class="w-full p-2 border rounded" value="{{ $task->due_date }}">
        </div>

        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-bold mb-2">Prioridade</label>
            <select name="priority" id="priority" class="w-full p-2 border rounded">
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Baixa</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Média</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Alta</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="completed" class="block text-gray-700 font-bold">Status</label>
            <select name="completed" id="completed" class="w-full border p-2 rounded">
                <option value="0" {{ !$task->completed ? 'selected' : '' }}>Pendente</option>
                <option value="1" {{ $task->completed ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Atualizar</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
        </div>
    </form>
</div>
@endsection