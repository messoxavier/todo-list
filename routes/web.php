<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return Auth::check() ? redirect()->route('tasks.index') : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
