@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h1 class="text-center mb-4">Criar Nova Tarefa</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection