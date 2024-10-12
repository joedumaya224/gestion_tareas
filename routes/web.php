<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login'); 
});


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/tasks', [TareasController::class, 'index'])->name('tareas.index');
    Route::get('/tasks/create', [TareasController::class, 'create'])->name('tareas.create');
    Route::post('/tasks', [TareasController::class, 'store'])->name('tareas.store');
    Route::post('/tasks/{task}/complete', [TareasController::class, 'complete'])->name('tareas.complete');
    Route::delete('/tasks/{task}', [TareasController::class, 'destroy'])->name('tareas.destroy'); 
});
