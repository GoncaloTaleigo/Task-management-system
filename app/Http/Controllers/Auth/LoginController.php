<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function show()
   {
      return view("login");
   }


   public function login(Request $request)
   {

      $credentials = $request->validate([
         'username' => "required",
         'password' => "required"
      ]);


      if (Auth::attempt($credentials)) {
         $request->session()->regenerate(); // prevent session fixation
         return redirect()->intended('/dashboard');
      }

      return back()->withErrors([
         'username' => 'Invalid username or password.',
      ]);
   }


   public function logout(Request $request)
   {
      Auth::logout();                     // log the user out
      $request->session()->invalidate();  // destroy session
      $request->session()->regenerateToken(); // prevent CSRF reuse

      return redirect('/login');
   }
}
