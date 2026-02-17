<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Notifications\TaskAssign;

class TaskController extends Controller
{
    public function show()
    {
        $employees = User::where("role", "employee")->get();
        return view("createTask", compact("employees"));
    }


    public function showAll(Request $request)
    {

        $user = Auth::user();
        $filter = $request->query("filter", "all");
        $today = Carbon::today()->toDateString();

        if ($user->role !== 'admin' && $request->has('filter')) {
            abort(403);
        }

        if ($user->role == "employee") {
            $query = Task::where('assigned_to', $user->id);
        } else {
            $query = Task::query();
        }

        // Apply date filter
        if ($filter === 'today') {
            $query->whereDate('due_date', $today);
        } elseif ($filter === 'overdue') {
            $query->whereDate('due_date', '<', $today);
        } elseif ($filter === 'no-deadline') {
            $query->whereNull('due_date');
        }

        $tasks = $query->get();

        return view("allTasks", compact("tasks"));
    }




    public function createTask(Request $request)
    {
        //Validar input
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'due_date' => 'nullable|date',
            'assigned_to' => 'required|exists:users,id'
        ]);


        $task=Task::create($validated);

        $employee = User::findOrFail($request->assigned_to);
        $employee->notify(new TaskAssign($task));

        return redirect("/createTask")->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        //redireciona para uma página para editar com os dados do user
        $employees = User::where("role", "employee")->get();
        return view("editTask", compact("task", "employees"));
    }


    public function update(Request $request, Task $task)
    {


        $user = Auth::user();


        if ($user->role == "admin") {
            $validated = $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:50',
                'due_date' => 'required',
                'assigned_to' => 'required',
            ]);
        } else if ($user->role == "employee") {
            $validated = $request->validate([
                'status' => 'required|string',
            ]);
        }

        $validated["status"] = Str::lower($validated["status"]);


        $task->update($validated);

        return redirect()->route('tasks');
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
