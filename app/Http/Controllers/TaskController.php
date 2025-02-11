<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Obtém as tarefas do usuário autenticado
        $query = Auth::user()->tasks();

        // Se houver um termo de busca, aplica o filtro no título
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Ordena por data de criação (mais recentes primeiro)
        $tasks = $query->orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {
        // Garante que o usuário só pode editar suas próprias tarefas
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Você não tem permissão para editar esta tarefa.');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Garante que o usuário só pode atualizar suas próprias tarefas
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Você não tem permissão para atualizar esta tarefa.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function delete(Task $task)
    {
        // Garante que o usuário só pode visualizar a página de exclusão de suas próprias tarefas
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Você não tem permissão para excluir esta tarefa.');
        }

        return view('tasks.delete', compact('task'));
    }

    public function destroy(Task $task)
    {
        // Garante que o usuário só pode excluir suas próprias tarefas
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Você não tem permissão para excluir esta tarefa.');
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
