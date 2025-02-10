@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h1 class="text-center mb-4">Editar Tarefa</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="completed" class="form-label">Status</label>
                <select name="completed" id="completed" class="form-control">
                    <option value="0" {{ !$task->completed ? 'selected' : '' }}>Pendente</option>
                    <option value="1" {{ $task->completed ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection