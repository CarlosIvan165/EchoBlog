<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'can:dashboard-access'])->name('dashboard');

/* posts */
Route::get('/post/create', [PostsController::class, 'create'])->middleware(['auth'])->name('posts.index');
Route::get('/post/edit/{post}', [PostsController::class, 'edit'])->middleware(['auth'])->name('posts.edit');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('posts.show');

/* escritores */
Route::get('/employee/create', [EmployeeController::class, 'create'])->middleware(['auth', 'can:admin'])->name('employees.index');
Route::get('/employee/edit/{user}', [EmployeeController::class, 'edit'])->middleware(['auth', 'can:admin'])->name('employees.edit');

/* Categorias */
Route::get('categorias/create', [CategoryController::class, 'create'])->middleware(['auth', 'can:admin'])->name('category.index');

/* Comentario */
Route::post('/posts/{post}', [ComentarioController::class, 'store'])->name('comentario.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
