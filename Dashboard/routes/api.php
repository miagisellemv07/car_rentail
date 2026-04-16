<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\loyalty_levelController;
use App\Http\Controllers\Api\driverController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\BrandController;
Route::resource('/users',UserController::class);
Route::resource('/rentals',RentalController::class);
Route::resource('/drivers',driverController::class);
Route::resource('/cars',CarController::class);
Route::resource('/brands',BrandController::class);
Route::resource('/loyalty_levels',loyalty_levelController::class);
Route::put('rentals/{id}/status', [RentalController::class, 'updateStatus']);
Route::put('cars/{id}/status', [CarController::class, 'updateStatus']);