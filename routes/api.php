<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\V1\ShortLinksController;
use Illuminate\Support\Facades\Route;




Route::get('{short_link}', [ShortLinksController::class, 'shortLink']);

Route::prefix('v1')->group(function () {
    Route::get('/links', [ShortLinksController::class, 'index']);
    Route::post('/links', [ShortLinksController::class, 'store']);

    Route::get('/users/{user}/links', [UsersController::class, 'index']);
});
