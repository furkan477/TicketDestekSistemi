<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'loginShow'])->name('login.show');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'registerShow'])->name('register.show');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');



Route::get('/',[HomeController::class,'Index'])->name('index')->middleware('auth');

Route::get('/destek/create',[HomeController::class,'destekShow'])->name('destek.show')->middleware('auth');
Route::post('/destek/create',[HomeController::class,'destekCreate'])->name('destek.create')->middleware('auth');

Route::get('/destek/list/active',[HomeController::class,'destekListActive'])->name('destek.list.active')->middleware('auth');
Route::get('/destek/list/hanger',[HomeController::class,'destekListHanger'])->name('destek.list.askı')->middleware('auth');
Route::get('/destek/list/terminated',[HomeController::class,'destekListTerminated'])->name('destek.list.son')->middleware('auth');

Route::get('/destek/about/{id}',[HomeController::class,'destekAbout'])->name('destek.about')->middleware('auth');

Route::get('/destek/delete/{id}',[HomeController::class,'destekDelete'])->name('destek.delete')->middleware('auth');

Route::get('/destek/update/{id}',[HomeController::class,'destekUpdateShow'])->name('destek.update.show')->middleware('auth');
Route::post('/destek/update/{id}',[HomeController::class,'destekUpdate'])->name('destek.update')->middleware('auth');

Route::post('/destek/create/{destek}',[HomeController::class,'destekMessageCreate'])->name('destek.message.create')->middleware('auth');

Route::get('/destek/terminated/{destek}',[HomeController::class,'destekStatusTerminated'])->name('destek.status.terminated')->middleware('auth');