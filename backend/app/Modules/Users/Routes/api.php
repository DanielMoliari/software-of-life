<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Users\Controllers\UserController;

Route::prefix('api')->group(function () {
    Route::apiResource('usuarios', UserController::class);
});