<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function show()
    {

        $employees=User::where("role","employee")->count();
        $tasks=Task::all()->count();
        $dueDate=Task::whereDate("due_date", Carbon::today())->count();
        $noDeadline=Task::where("due_date",null)->count();

        return view("dashboard",compact("employees","tasks","dueDate","noDeadline"));
    }
}
