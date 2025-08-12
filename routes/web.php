<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::resource(name: 'home', controller: WelcomeController::class);

Route::resource(name: 'about', controller: AboutController::class);

Route::resource(name: 'contact', controller: ContactController::class);

Route::resource(name: 'motor', controller: MotorController::class);

Route::resource(name: 'mobil', controller: MobilController::class);

Route::resource(name: 'mobeel', controller: CreateController::class);


