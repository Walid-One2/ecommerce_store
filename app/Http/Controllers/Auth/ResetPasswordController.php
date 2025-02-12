<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

// Contrôleur Auth - Réinitialisation mot de passe
// Traitement du nouveau mot de passe

class ResetPasswordController extends Controller
{
    
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;
}
