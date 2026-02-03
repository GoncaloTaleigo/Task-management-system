<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function show()
    {
        $employees = User::where("role", "employee")->get();
        return view("createTask", compact("employees"));
    }


    public function showAll()
    {

        $tasks = Task::all();

        return view("allTasks", compact("tasks"));
    }



    public function createTask(Request $request)
    {
        //Validar input
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'due_date' => '',
            'assigned_to' => ''
        ]);


        Task::create($validated);

        return redirect("/createTask")->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        //redireciona para uma página para editar com os dados do user
        return view("editTask", compact("task"));
    }
    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'full_name' => 'required|string|max:50',
            'username' => 'required|string|max:50',
            'password' => 'required',
        ]);

        $user->update($validated);

        return redirect()->route('manageUsers');
    }


    public function delete($id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect()
            ->route('tasks')
            ->with('success', 'Task deleted successfully.');
    }
}
