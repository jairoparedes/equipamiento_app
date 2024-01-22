<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquipoUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/equipos', [EquipoController::class, 'index'], function () {
        return Inertia::render('Equipos/Index');
    })->name('equipos');

    Route::get('/equipo/create', [EquipoController::class, 'create'], function () {
        return Inertia::render('Equipos/Create');
    })->name('equipo.create');

    Route::get('/equipo/{equipo}/edit', [EquipoController::class, 'edit'], function () {
        return Inertia::render('Equipos/Edit');
    })->name('equipo.edit');

    Route::get('/equipo/print', [EquipoController::class, 'print'], function () {
        return Inertia::render('Equipos/Print');
    })->name('equipo.print');

    Route::get('/equipo_user', [EquipoUserController::class, 'index'], function () {
        return Inertia::render('EquipoUser/Index');
    })->name('equipo_user');

    Route::get('/equipo_user/create', [EquipoUserController::class, 'create'], function () {
        return Inertia::render('EquipoUser/Create');
    })->name('equipo_user.create');

    Route::get('/equipo_user/{equipo_user}/edit', [EquipoUserController::class, 'edit'], function () {
        return Inertia::render('EquipoUser/Edit');
    })->name('equipo_user.edit');
    //user routes
    Route::get('/users', [UserController::class, 'index'], function () {
        return Inertia::render('Users/Index');
    })->name('users');

});
