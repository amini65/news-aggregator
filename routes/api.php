<?php

use Illuminate\Support\Facades\Route;


Route::middleware('guest')->prefix('auth')->group(function () {
    Route::post('reset', [\App\Http\Controllers\V1\AuthController::class,'reset'])->name('reset');
    Route::post('login', [\App\Http\Controllers\V1\AuthController::class,'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\V1\AuthController::class,'logout'])->name('logout');

});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {


});
