@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Criar Nova Tarefa</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold">Título</label>
            <input type="text" name="title" id="title" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold">Descrição</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label for="due_date" class="block text-gray-700 font-bold mb-2">Prazo</label>
            <input type="date" name="due_date" id="due_date" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-bold mb-2">Prioridade</label>
            <select name="priority" id="priority" class="w-full p-2 border rounded">
                <option value="1">Baixa</option>
                <option value="2">Média</option>
                <option value="3">Alta</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
        </div>
    </form>
</div>
@endsection