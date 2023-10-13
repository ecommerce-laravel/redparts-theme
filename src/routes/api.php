<?php

use Illuminate\Support\Facades\Route;
use Wjurry\RedParts\Http\Controllers\ConfigController;

Route::get('/config', [ConfigController::class, 'index']);