<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Users\Controllers\UserController;

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
});