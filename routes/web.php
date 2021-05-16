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

// learning resources : https://www.youtube.com/watch?v=ko4PU4eplnY&ab_channel=IrebeLibrary

Route::post('/login/process',[AuthenticationController::class,'AccountLogin']);
Route::post('/register/add-account',[AuthenticationController::class,'AddNewAccount']);
Route::get('/logout',[AuthenticationController::class,'AccountLogout']);

// group1
Route::get('/login',[AuthenticationController::class,'ShowLogin'])->middleware('AuthenticationMiddleware');
Route::get('/register',[AuthenticationController::class,'ShowRegister'])->middleware('AuthenticationMiddleware');
Route::get('/dashboard/customer',[AuthenticationController::class,'ShowCustomerDashboard'])->middleware('AuthenticationMiddleware');
Route::get('/dashboard/agent',[AuthenticationController::class,'ShowAgentDashboard'])->middleware('AuthenticationMiddleware');