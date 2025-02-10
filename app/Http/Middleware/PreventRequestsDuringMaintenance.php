<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

// Middleware - Mode maintenance
// Bloque les requêtes pendant la maintenance

class PreventRequestsDuringMaintenance extends Middleware
{
    
    protected $except = [
        
    ];
}
