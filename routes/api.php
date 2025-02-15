<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Routes API - Endpoints REST
// Routes pour l'API

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
