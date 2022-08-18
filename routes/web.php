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

    Route::prefix('idiomas')->controller(CursoController::class)->name('curso.')->group(function () {
        Route::get('dictables', 'index')->name('index');
        Route::get('cursos/{id?}', 'cursos')->name('cursos');
    });

    Route::prefix('director')->controller(DirectorMatriculaController::class)->name('director.matricula.')->group(function () {
        Route::get('programacion/crear', 'crear_mensual')->name('programacion.crear');
        Route::get('programacion/{year?}/{month?}', 'programacion')->name('programacion.index')->whereNumber('year')->whereNumber('month');
        Route::get('prematricula/{year?}/{month?}', 'prematricula')->name('prematricula.index')->whereNumber('year')->whereNumber('month');
    });

    Route::prefix('docente')->controller(DocenteController::class)->name('docente.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{codigo}/mostrar', 'show')->name('show');
        Route::get('/registrar', 'registrar')->name('registrar');
        Route::get('/{codigo}/editar', 'editar')->name('editar');
        Route::get('/{codigo}/idioma', 'idioma')->name('idioma');
    });

    Route::prefix('autoridad')->controller(AutoridadController::class)->name('autoridad.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{dni}/mostrar', 'show')->name('show')->whereNumber('dni');
        Route::get('/registrar', 'registrar')->name('registrar');
        Route::get('/{dni}/editar', 'editar')->name('editar')->whereNumber('dni');
    });
});
