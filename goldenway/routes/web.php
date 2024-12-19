<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use Symfony\Component\Routing\RouteCompiler;

Route::get('/', function () {
    return view('welcome');
});



route::get('/home',[AdminController::class,'index'])->name('home');

Route::post('/admin/register-user', [AdminController::class, 'store']);



Route::resource('routes', RouteController::class);
Route::get('/routes/create', [RouteController::class, 'create'])->name('routes.create');
Route::post('/routes', [RouteController::class, 'store'])->name('routes.store');
route::get('/book/{id}',[RouteController::class,'book'])->name('book');
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Edit user form
Route::get('/routes/edit/{id}', [RouteController::class, 'edit'])->name('routes.edit'); // Edit user form
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update'); // Update user details
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete user


