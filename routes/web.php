<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\RecetasController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

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
