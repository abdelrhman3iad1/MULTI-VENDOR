<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(["auth","verified"])->as("dashboard.")->prefix("dashboard")->group(function(){
        Route::get('/', [DashboardController::class , "index"]);
        Route::resource("categories",CategoryController::class);
});
