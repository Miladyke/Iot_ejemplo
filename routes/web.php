<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\StationController;

/*
|--------------------------------------------------------------------------
| Web Routes - IoT Panel
|--------------------------------------------------------------------------
*/

// ========================================
// RUTA PRINCIPAL - DASHBOARD
// ========================================
Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ========================================
// SENSORES DE HUMEDAD - CRUD COMPLETO
// ========================================
Route::prefix('sensors')->name('sensors.')->group(function () {
    // Lista de sensores
    Route::get('/', [SensorController::class, 'index'])->name('index');
    
    // Formulario para crear/ingresar datos de sensor
    Route::get('/create', [SensorController::class, 'create'])->name('create');
    Route::post('/', [SensorController::class, 'store'])->name('store');
    
    // Ver, editar y eliminar sensores individuales
    Route::get('/{sensor}', [SensorController::class, 'show'])->name('show');
    Route::get('/{sensor}/edit', [SensorController::class, 'edit'])->name('edit');
    Route::put('/{sensor}', [SensorController::class, 'update'])->name('update');
    Route::delete('/{sensor}', [SensorController::class, 'destroy'])->name('destroy');
});

// ========================================
// ESTACIONES - CRUD COMPLETO
// ========================================
Route::prefix('stations')->name('stations.')->group(function () {
    Route::get('/', [StationController::class, 'index'])->name('index');
    Route::get('/create', [StationController::class, 'create'])->name('create');
    Route::post('/', [StationController::class, 'store'])->name('store');
    Route::get('/{station}', [StationController::class, 'show'])->name('show');
    Route::get('/{station}/edit', [StationController::class, 'edit'])->name('edit');
    Route::put('/{station}', [StationController::class, 'update'])->name('update');
    Route::delete('/{station}', [StationController::class, 'destroy'])->name('destroy');
});

// ========================================
// RUTAS DEL DASHBOARD (MÓDULOS)
// ========================================

// Panel tiempo real (telemetría)
Route::get('/panel', function () {
    return view('panel');
})->name('panel');

// ========================================
// RUTAS ADICIONALES DEL SIDEBAR
// ========================================

// Tabla de datos general
Route::get('/tabla', function () {
    return view('tabla');
})->name('tabla');

// Dispositivos conectados
Route::get('/dispositivos', function () {
    return view('dispositivos');
})->name('dispositivos');