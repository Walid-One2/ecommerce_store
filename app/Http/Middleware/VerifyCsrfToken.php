<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

// Middleware - Protection CSRF
// Vérifie les tokens CSRF des formulaires

class VerifyCsrfToken extends Middleware
{
    
    protected $except = [
        
    ];
}
