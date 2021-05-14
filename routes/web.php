<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthenticationController::class,'ShowLogin']);
Route::post('/login/process',[AuthenticationController::class,'AccountLogin']);
Route::get('/register',[AuthenticationController::class,'ShowRegister']);
Route::post('/register/add-account',[AuthenticationController::class,'AddNewAccount']);
Route::get('/dashboard',[AuthenticationController::class,'ShowDashboard']);
Route::get('/logout',[AuthenticationController::class,'AccountLogout']);