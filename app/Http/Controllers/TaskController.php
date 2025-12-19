<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $todo = Task::where('status', 'à faire')->orderBy('created_at', 'desc')->get();
        $doing = Task::where('status', 'en cours')->get();
        $done = Task::where('status', 'terminée')->get();
        return view('welcome', compact('todo','doing', 'done'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // On crée la tâche dans la base (le statut sera "à faire" par défaut grâce à ta migration)
        Task::create($validated);

        // On recharge la page pour voir le nouveau ticket apparaître
        return back();
    }
    public function updateStatus(Request $request, Task $task)
    {
        $task->update(['status' => $request->status]);
        return back();
    }
    public function destroy(Task $task)
{
    $task->delete();
    return back();
}
}
