<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Отримати всі повідомлення.
Route::get('/messages', [ChatController::class, 'fetchMessages']);

// Надіслати нове повідомлення.
Route::post('/messages', [ChatController::class, 'sendMessage']);
