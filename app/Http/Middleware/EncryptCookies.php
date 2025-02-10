<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

// Middleware - Chiffrement cookies
// Chiffre et déchiffre les cookies

class EncryptCookies extends Middleware
{
    
    protected $except = [
        
    ];
}
