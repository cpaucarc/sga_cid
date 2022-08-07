<?php

use App\Http\Controllers\AutoridadController;
use App\Http\Controllers\CursoController;

use App\Http\Controllers\DirectorMatriculaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MatriculaController;

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

    Route::prefix('director')->controller(DirectorMatriculaController::class)->group(function () {
        Route::get('programacion/crear', 'crear_mensual')->name('director.matricula.programacion.crear');
        Route::get('programacion/{year?}/{month?}', 'programacion')->name('director.matricula.programacion.index');
        Route::get('prematricula/{year?}/{month?}', 'prematricula')->name('director.matricula.prematricula.index');
    });

    Route::prefix('docente')->controller(DocenteController::class)->group(function () {
        Route::get('/', 'index')->name('docente.index');
        Route::get('/{codigo}/mostrar', 'show')->name('docente.show');
        Route::get('/registrar', 'registrar')->name('docente.registrar');
        Route::get('/{codigo}/editar', 'editar')->name('docente.editar');
        Route::get('/{codigo}/idioma', 'idioma')->name('docente.idioma');
    });

    Route::prefix('autoridad')->controller(AutoridadController::class)->group(function () {
        Route::get('/', 'index')->name('autoridad.index');
        Route::get('/{dni}/mostrar', 'show')->name('autoridad.show');
        Route::get('/registrar', 'registrar')->name('autoridad.registrar');
        Route::get('/{dni}/editar', 'editar')->name('autoridad.editar');
    });
});
