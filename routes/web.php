<?php

use App\Http\Controllers\CursoController;

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

    Route::prefix('programacion')->controller(ProgramacionController::class)->group(function () {
        Route::get('mensual', 'index')->name('programacion.mensual.index');
        Route::get('mensual/crear', 'crearMensual')->name('programacion.mensual.crear');
        Route::get('prematricula', 'prematricula')->name('programacion.prematricula');
        Route::get('matricula', 'matricula')->name('programacion.matricula');
        Route::get('pago', 'pago')->name('programacion.pago');
    });

    Route::prefix('docente')->controller(DocenteController::class)->group(function () {
        Route::get('/', 'index')->name('docente.index');
        Route::get('/mostrar/{uuid}', 'show')->name('docente.show');
        Route::get('/registrar', 'registrar')->name('docente.registrar');
        Route::get('/editar/{uuid}', 'editar')->name('docente.editar');
        Route::get('/idiomas/{uuid}', 'idiomas')->name('docente.idiomas');
    });

   Route::prefix('director/matriculas')->controller(MatriculaController::class)->group(function (){
       Route::get('prematricula', 'prematricula_director')->name('matriculas.prematricula.director');
   });

});
