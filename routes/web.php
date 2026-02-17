<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, "show"])->name("login");
Route::get('/login', [LoginController::class, "show"])->name("login");
Route::post('/login', [LoginController::class, "login"]);

Route::get('/dashboard', [DashboardController::class, "show"])->name("dashboard")->middleware("auth");

Route::get('/createTask', [TaskController::class, "show"])->name("createTask")->middleware("auth");
Route::post('/createTask', [TaskController::class, "createTask"]);


Route::get("/manageUsers", [ManageUsersController::class, "show"])->name("manageUsers")->middleware("auth");
Route::get("/manageUsers/{user}/edit", [ManageUsersController::class, "edit"])->name('users.edit');
Route::put("/manageUsers/{user}/update", [ManageUsersController::class, "update"])->name('users.update');
Route::delete("/manageUsers/{user}", [ManageUsersController::class, "delete"])->name('users.delete');

Route::get("createUser", [ManageUsersController::class, "showCreatePage"])->name("createUser");
Route::post("createUser", [ManageUsersController::class, "create"]);

Route::get("/tasks", [TaskController::class, "showAll"])->name("tasks")->middleware("auth");
Route::get("/tasks/{task}/edit", [TaskController::class, "edit"])->name('tasks.edit');
Route::put("/tasks/{task}/update", [TaskController::class, "update"])->name('tasks.update');
Route::delete("/tasks/{task}", [TaskController::class, "delete"])->name('tasks.delete');

Route::get("/profile", [ManageUsersController::class, "profile"])->name("profile")->middleware("auth");

Route::get("/notifications", [NotificationsController::class, "showNotifications"])->name("notifications")->middleware("auth");

Route::post("/logout", [LoginController::class, "logout"])->name("logout");
