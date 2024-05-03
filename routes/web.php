<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\User\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ApplicationController::class, 'index'])->name('index');
Route::get('/login',[LoginController::class, 'index'])->name('login');

Route::post('/login',[LoginController::class, 'login']);

Route::group(['namespace'=>'Backend','prefix'=>'company-backend','middleware'=>'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' =>'users'],function (){
        Route::get('/',[UserController::class, 'index'])->name('users');
        Route::get('/user-profile',[UserController::class, 'profile'])->name('user-profile');
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});