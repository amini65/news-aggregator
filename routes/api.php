<?php

use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('reset', [\App\Http\Controllers\V1\AuthController::class,'reset'])->name('reset');
    Route::post('login', [\App\Http\Controllers\V1\AuthController::class,'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\V1\AuthController::class,'logout'])->name('logout');

});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {

    Route::get('articles',[\App\Http\Controllers\V1\ArticleController::class,'index']);
    Route::get('article/{article}',[\App\Http\Controllers\V1\ArticleController::class,'show']);

    Route::get('preference/create',[\App\Http\Controllers\V1\PreferenceController::class,'create']);
    Route::get('preference/show',[\App\Http\Controllers\V1\PreferenceController::class,'show']);

});
