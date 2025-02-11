<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

// Middleware - Hôtes de confiance
// Validation des hôtes autorisés

class TrustHosts extends Middleware
{
    
    public function hosts()
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
