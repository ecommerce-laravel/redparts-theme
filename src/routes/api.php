<?php

use Illuminate\Support\Facades\Route;
use Wjurry\EcommerceLaravel\Themes\RedParts\Controllers\ConfigController;

Route::get('/config', [ConfigController::class, 'index']);