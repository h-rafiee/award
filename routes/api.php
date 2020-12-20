<?php

use App\Http\Controllers\API\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('/events/register/{event:slug}', [EventController::class, 'register'])->name('event.register');
});
