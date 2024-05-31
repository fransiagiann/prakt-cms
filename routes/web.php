<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registercontroller;


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

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', [ProfileController:: class, 'index']);
Route::get('/profiledashboard', [ProfileController:: class, 'index']);

Route::resource('/dashboard/profile', ProfileController::class);

Route::get('/contact', function () {
    return view('/contact');
});
Route::get('/dashboard', function () {
    return view('/dashboard');
});

Route::get('/login', [logincontroller::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [logincontroller::class,'authenticate']);
Route::post('/logout', [logincontroller::class,'logout']);

Route::get('/register', [registercontroller::class,'index'])->middleware('guest');
Route::post('/register', [registercontroller::class,'store']);
