<?php

use App\Http\Controllers\APIs\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\StudentController;
use Illuminate\Auth\Events\Login;

// Public Route
Route::post("register", [AuthController::class, 'register']);
Route::post("login", [AuthController::class, 'login']);
Route::get("logout", [AuthController::class, 'logout'])->middleware("auth:sanctum");


// Private Route
Route::middleware("auth:sanctum")->group(function () {
    Route::prefix("student")->group(function () {
        Route::get("/", [StudentController::class, 'index']);
        Route::post("/", [StudentController::class, 'store']);
        // Route With ID
        Route::get("/{id}", [StudentController::class, 'show']);
        Route::post("/update/{id}", [StudentController::class, 'update']);
        Route::get("/destroy/{id}", [StudentController::class, 'destroy']);
    });



});
