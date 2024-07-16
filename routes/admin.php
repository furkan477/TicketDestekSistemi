<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'admin.auth'], function (){

    Route::get('/dashboard',[HomeController::class,'admin'])->name('admin.dashboard');

    Route::get('/destek/active',[HomeController::class,'destekActive'])->name('admin.destek.active');
    Route::get('/destek/terminated',[HomeController::class,'destekTerminated'])->name('admin.destek.terminated');
    Route::get('/destek/hanger',[HomeController::class,'destekHanger'])->name('admin.destek.hanger');

    Route::get('/destek/delete/{id}',[HomeController::class,'destekDelete'])->name('admin.destek.delete');
    Route::get('/destek/update/{id}',[HomeController::class,'destekUpdateShow'])->name('admin.destek.update.show');
    Route::get('/destek/about/{id}',[HomeController::class,'destekAbout'])->name('admin.destek.about');
    Route::post('/destek/update/{id}',[HomeController::class,'destekUpdate'])->name('admin.destek.update');

    Route::post('/destek/about/message/{destek}',[HomeController::class,'destekAboutMessage'])->name('admin.destek.about.message');
    Route::post('/destek/terminated/{destek}',[HomeController::class,'destekstatus'])->name('admin.destek.status');

});