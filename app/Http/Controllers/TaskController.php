<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function show()
    {
        $employees=User::where("role","employee")->get();
        return view("createTask",compact("employees"));
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
}
