<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;


Route::prefix("user")->group(function () {

    // Show Auth Pages
    Route::get("register", [AuthController::class, 'Show_register'])->name("register");
    Route::get("login", [AuthController::class, 'Show_login'])->name("login");


    // StroreAuth
    Route::post("login", [AuthController::class, 'login'])->name("login.store");
    Route::post("register", [AuthController::class, 'register'])->name("register.store");



    Route::post("logout", [AuthController::class, 'logout'])->name('logout');
});





Route::get("/", function () {
    return view("welcome");
})->name("home");

Route::prefix("student")->name("student.")->group(function () {
    Route::get("/index", [StudentController::class, 'index'])->name("index");
    Route::get("/create", [StudentController::class, 'create'])->name("create");
    Route::post("/store", [StudentController::class, 'store'])->name("store");

    // Route With ID
    Route::get("/show/{id}", [StudentController::class, 'show'])->name("show");
    Route::get("/edit/{id}", [StudentController::class, 'edit'])->name("edit");
    Route::post("/update/{id}", [StudentController::class, 'update'])->name("update");
    Route::get("/destroy/{id}", [StudentController::class, 'destroy'])->name("destroy");
});
