<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Pacientes
        Route::get('pacientes',[PacientesController::class,'index'])->name("pacientes");
        Route::get('nuevo_paciente',[PacientesController::class,'create'])->name("nuevo_paciente");
        Route::post('guardar_paciente',[PacientesController::class,'store'])->name("guardar_paciente");
        Route::get('editar_paciente/{id}',[PacientesController::class,'edit'])->name("editar_paciente/{id}");
        Route::post('actualizar_paciente/{id}',[PacientesController::class,'update'])->name("actualizar_paciente");

        // Recetas
        Route::get('recetas/{id}',[RecetasController::class,'show'])->name("recetas/{id}");
        Route::get('nueva_receta/{id}',[RecetasController::class,'create'])->name("nueva_receta/{id}");
        Route::post('guardar_receta/{id}',[RecetasController::class,'store'])->name("guardar_receta/{id}");
        Route::get('editar_receta/{id}',[RecetasController::class,'edit'])->name("editar_receta/{id}");
        Route::get('pdf_receta/{id}',[RecetasController::class,'pdf'])->name("pdf_receta");
        Route::post('enviar_receta/{id}',[RecetasController::class,'enviar_receta'])->name("enviar_receta/{id}");
});



