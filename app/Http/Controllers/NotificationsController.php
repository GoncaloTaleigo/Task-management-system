<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function showNotifications()
    {
   
        return view('notifications');
    }
}
