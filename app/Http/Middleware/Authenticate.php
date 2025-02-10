<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

// Middleware - Authentification
// Vérifie que l'utilisateur est authentifié

class Authenticate extends Middleware
{
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
