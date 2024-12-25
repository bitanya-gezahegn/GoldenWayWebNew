<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\UserController;

use Symfony\Component\Routing\RouteCompiler;
use App\Http\Controllers\TripsController;

Route::get('/', function () {
    return view('welcome');
});



route::get('/redirect',[AdminController::class,'redirect'])->name('redirect');
Route::get('/trips.index', [TripsController::class,'index']);
Route::get('/schedules.index', [SchedulesController::class,'index']);

Route::resource('routes', RouteController::class);
Route::get('/routes/create', [RouteController::class, 'create'])->name('routes.create');
Route::post('/routes', [RouteController::class, 'store'])->name('routes.store');
route::get('/book/{id}',[RouteController::class,'book'])->name('book');// Edit user form
Route::get('/routes.edit/{id}', [RouteController::class, 'edit']); // Edit user form
route::post('/routes.edit_confirm/{id}',[RouteController::class,'edit_confirm']);
Route::get('/trips/{trip}/edit', [TripsController::class, 'edit'])->name('trips.edit');
Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::put('/trips/{trip}', [TripsController::class, 'update'])->name('trips.update');








Route::get('/redirect', [AdminController::class, 'redirect'])->name('redirect');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/register-user', [AdminController::class, 'create'])->name('admin.register-user');
    Route::get('/register-user', [AdminController::class, 'create'])->name('admin.register-user');
    Route::get('/admin.users.index', [AdminController::class, 'getindex'])->name('admin.users.getindex');
    Route::post('/adminstoring', [AdminController::class, 'adminstoring'])->name('adminstoring');
    Route::get('/adminediting/{id}', [AdminController::class, 'adminediting'])->name('adminediting');
    Route::delete('/admindestroying/{id}', [AdminController::class, 'admindestroying'])->name('admindestroying');
    Route::put('/adminupdating/{id}', [AdminController::class, 'adminupdating'])->name('adminupdating');




    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Resource Routes
Route::resources([
    'routes' => RouteController::class,
    'trips' => TripsController::class,
    'schedules' => SchedulesController::class,
]);

Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::get('/admincreate', [AdminController::class, 'admincreate']);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('/search-schedule', [AdminController::class, 'search'])->name('schedule.search');