<?php

use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\MobileController;
use App\Http\Controllers\API\WinnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('/events/register/{event:slug}', [EventController::class, 'register'])->name('event.register');
    Route::resource('events', EventController::class)->parameters([
        'events' => 'events:slug',
    ]);

    Route::resource('mobiles', MobileController::class)->only([
        'index'
    ]);

    Route::resource('winners', WinnerController::class)->only([
        'index'
    ]);
});
