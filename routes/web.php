<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class,"show"]);
Route::post('/', [LoginController::class,"login"]);
Route::get('/dashboard', function(){
    return view("dashboard");
});
