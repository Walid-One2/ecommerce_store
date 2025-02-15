<?php

use Illuminate\Support\Facades\Broadcast;

// Routes - Canaux Broadcasting
// Canaux de diffusion temps réel

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
