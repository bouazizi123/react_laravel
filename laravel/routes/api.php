<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DemandeController;

Route::get('/demandes', [DemandeController::class, 'index']);
Route::post('/demandes', [DemandeController::class, 'store']);
Route::get('/demandes/{id}', [DemandeController::class, 'show']);
Route::put('/demandes/{id}', [DemandeController::class, 'update']);
Route::delete('/demandes/{id}', [DemandeController::class, 'destroy']);
