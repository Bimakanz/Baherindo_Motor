<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::resource(name: 'home', controller: WelcomeController::class);

Route::resource(name: 'about', controller: AboutController::class);

Route::resource(name: 'contact', controller: ContactController::class);

Route::resource(name: 'form', controller: FormController::class);

