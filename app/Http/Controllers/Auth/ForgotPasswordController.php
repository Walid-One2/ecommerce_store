<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

// Contrôleur Auth - Mot de passe oublié
// Gestion de la réinitialisation du mot de passe

class ForgotPasswordController extends Controller
{
    
    use SendsPasswordResetEmails;
}
