<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChangeRoleController;
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

Route::get('/login',[AuthenticationController::class,'ShowLogin'])->middleware('LoginMiddleware');
Route::get('/register',[AuthenticationController::class,'ShowRegister'])->middleware('RegisterMiddleware');
Route::get('/dashboard/customer',[AuthenticationController::class,'ShowCustomerDashboard'])->middleware(['AuthenticationMiddleware','CustomerRoleMiddleware']);
Route::get('/dashboard/agent',[AuthenticationController::class,'ShowAgentDashboard'])->middleware(['AuthenticationMiddleware','AgentRoleMiddleware']);

// change user role
Route::get('/set_customer',[ChangeRoleController::class,'SetRoleToCustomer']);
Route::get('/set_agent',[ChangeRoleController::class,'SetRoleToAgent']);