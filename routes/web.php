<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProgramacionController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::prefix('idiomas')->controller(CursoController::class)->group(function () {
        Route::get('dictables', 'index')->name('curso.index');
        Route::get('cursos/{id?}', 'cursos')->name('curso.cursos');
    });

    Route::prefix('programacion')->controller(ProgramacionController::class)->group(function () {
        Route::get('mensual', 'index')->name('programacion.mensual.index');
        Route::get('mensual/crear', 'crearMensual')->name('programacion.mensual.crear');
    });

});
