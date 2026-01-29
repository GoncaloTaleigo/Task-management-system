<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class,"show"]);
Route::post('/', [LoginController::class,"login"]);

Route::get('/dashboard',[DashboardController::class,"show"])->name("dashboard");

Route::get('/createTask',[TaskController::class,"show"])->name("createTask");
Route::post('/createTask',[TaskController::class,"createTask"]);