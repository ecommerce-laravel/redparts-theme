<?php

use Illuminate\Support\Facades\Route;
use Wjurry\RedParts\Http\Controllers\ConfigController;
use Wjurry\RedParts\Http\Controllers\CurrencyController;

Route::middleware('web')->group(function () {
    Route::get('/config', [ConfigController::class, 'index']);
    Route::post('/currency/switch/{currency}', [CurrencyController::class, 'switch']);
});
