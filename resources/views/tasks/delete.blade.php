@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg text-center">
    <h1 class="text-2xl font-bold text-red-600 mb-4">Excluir Tarefa</h1>
    <p class="text-gray-700 mb-4">Tem certeza que deseja excluir a tarefa <strong>{{ $task->title }}</strong>?</p>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Excluir</button>
        <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </form>
</div>
@endsection