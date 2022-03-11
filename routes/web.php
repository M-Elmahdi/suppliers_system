<?php

use App\Http\Controllers\ActivityAssignController;
use App\Http\Controllers\admin\HomeController as AdminController;
use App\Http\Controllers\user\HomeController as UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::get('/navigator')->middleware('navigator');

Route::group(['middleware' => ['auth', 'isAdmin']], function(){
    Route::get('/admin/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/admin/register-user', [RegisterController::class, 'create'])->name('admin.register-user');
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::post('/supplier/activity/assign/{id}', [ActivityAssignController::class, 'assign'])->name('activities.assign');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('activities', ActivityController::class);
});

Route::group(['middleware' => ['auth', 'isUser']], function(){
    Route::get('/user/home', [UserController::class, 'index'])->name('users.home');
});