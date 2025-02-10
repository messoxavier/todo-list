@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h1 class="mb-4 text-center">Lista de Tarefas</h1>
        <div class="text-end mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Adicionar Nova Tarefa</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->completed ? 'Concluída' : 'Pendente' }}</td>
                    <td class="text-center">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection