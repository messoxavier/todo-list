@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4 text-center">
        <h1 class="mb-4">Excluir Tarefa</h1>
        <p class="lead">Tem certeza que deseja excluir a tarefa <strong>{{ $task->title }}</strong>?</p>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection