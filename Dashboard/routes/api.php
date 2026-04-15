<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RentalController;
Route::resource('/users',UserController::class);
Route::resource('/rentals',RentalController::class);