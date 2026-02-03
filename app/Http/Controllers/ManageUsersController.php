<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUsersController extends Controller
{
    public function show()
    {
        $users = User::all();

        return view("manageUsers", compact("users"));
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
}
