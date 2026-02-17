<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    public function show()
    {
        $users = User::all();

        return view("manageUsers", compact("users"));
    }

    public function showCreatePage()
    {
        return view("createUser");
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'full_name' => 'required|string|max:50',
            'username' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'password' => 'required',
        ]);

        $validated['role'] = 'employee';

        $validated["password"]=Hash::make($validated["password"]);

        User::create($validated);

        return redirect("/manageUsers")->with('success', 'User created successfully!');
    }


    public function edit(User $user)
    {
        //redireciona para uma página para editar com os dados do user
        return view("editUser", compact("user"));
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
        $user = User::find($id);

        $user->delete();

        return redirect()
            ->route('manageUsers')
            ->with('success', 'User deleted successfully.');
    }

    public function profile(Request $request){
        $user=$request->user();

        return view("profile",compact("user"));
    }
}
