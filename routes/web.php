<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;

// Ruta principal del reporte
Route::get('/', [ReporteController::class, 'index']);
Route::get('/reporte', [ReporteController::class, 'index']);

// Ruta para descargar PDF
Route::get('/reporte/pdf', [ReporteController::class, 'descargarPDF']);