<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {

        $user = Auth::user();


        if ($user->role == "admin") {

            $employees = User::where("role", "employee")->count();
            $tasks = Task::all()->count();
            $dueDate = Task::whereDate("due_date", Carbon::today())->count();
            $noDeadline = Task::where("due_date", null)->count();
            $pending=Task::where("status","pending")->count();
            $inProgress=Task::where("status","in progress")->count();
            $completed=Task::where("status","completed")->count();
            $overdue= Task::where('due_date', '<', now())->count();

            return view("dashboard", compact("employees", "tasks", "dueDate", "noDeadline","pending","inProgress","completed","overdue"));
        } elseif ($user->role == "employee") {
            $myTasks = Task::where("assigned_to", $user->id)->count();

            return view("dashboard", compact("myTasks"));
        }
    }
    
}
