<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('users');
    Route::get('add-user',[UserController::class,'add_form'])->name('add-user');
    Route::post('add-user-in-db',[UserController::class,'add'])->name('add-user');
});