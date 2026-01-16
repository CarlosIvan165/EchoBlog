<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'can:admin'])->name('dashboard.admin');

Route::get('/dashboard-autor', function () {
    return view('dashboard-autor');
})->middleware(['auth', 'can:autor'])->name('dashboard.autor');

/* Perfil publico */
Route::get('/perfil/{user:name}', [PerfilController::class, 'show'])->middleware(['auth'])->name('perfil.index');

/* posts */
Route::get('/post/edit/{post}', [PostsController::class, 'edit'])->middleware(['auth'])->name('posts.edit');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('posts.show');

/* escritores */
Route::get('/employee/edit/{user}', [EmployeeController::class, 'edit'])->middleware(['auth', 'can:admin'])->name('employees.edit');

/* Categorias */
Route::get('categorias/edit/{category}', [CategoryController::class, 'edit'])->middleware(['auth', 'can:admin'])->name('edit-category.edit');

/* Comentario */
Route::post('/posts/{post}', [ComentarioController::class, 'store'])->name('comentario.store');

/* Followers */
Route::post('{user:name}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
