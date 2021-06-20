<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChangeRoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\CustomerController;
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

Route::get('/',[AuthenticationController::class,'CheckIfLoggedIn']);
// learning resources : https://www.youtube.com/watch?v=ko4PU4eplnY&ab_channel=IrebeLibrary

Route::post('/login/process',[AuthenticationController::class,'AccountLogin']);
Route::post('/register/add-account',[AuthenticationController::class,'AddNewAccount']);
Route::get('/logout',[AuthenticationController::class,'AccountLogout']);

Route::get('/login',[AuthenticationController::class,'ShowLogin'])->middleware('LoginMiddleware');
Route::get('/register',[AuthenticationController::class,'ShowRegister'])->middleware('RegisterMiddleware');
Route::middleware(['PreventBackButtonMiddleware'])->group(function () {
    Route::get('/dashboard/customer',[AuthenticationController::class,'ShowCustomerDashboard'])->middleware(['AuthenticationMiddleware','CustomerRoleMiddleware']);
    Route::get('/dashboard/agent',[AuthenticationController::class,'ShowAgentDashboard'])->middleware(['AuthenticationMiddleware','AgentRoleMiddleware']);

    // change user role
    Route::get('/set_customer',[ChangeRoleController::class,'SetRoleToCustomer']);
    Route::get('/set_agent',[ChangeRoleController::class,'SetRoleToAgent']);

    // profile menu
    Route::get('/profile/main',[ProfileController::class,'ShowProfileMenu'])->middleware('ProfileMenuMiddleware');
    Route::get('/profile/edit',[ProfileController::class,'ShowEditProfileMenu'])->middleware('ProfileMenuMiddleware');
    Route::post('/profile/edit/execution',[ProfileController::class,'PerformEdit']);
    Route::get('/profile/back',[ProfileController::class,'ReturnBackDashboard']);

    // agent menu
    Route::get('/dashboard/agent/add',[PakaianController::class,'ShowAddPakaian'])->middleware('AgentRoleMiddleware');
    Route::post('/dashboard/agent/add/execution',[PakaianController::class,'PerformAddPakaian'])->middleware('AgentRoleMiddleware');
    Route::get('/dashboard/agent/edit/{id}',[PakaianController::class,'ShowEditPakaian'])->middleware('AgentRoleMiddleware');
    Route::post('/dashboard/agent/edit/execution',[PakaianController::class,'PerformEditPakaian'])->middleware('AgentRoleMiddleware');
    Route::get('/dashboard/agent/delete/{id}/execution',[PakaianController::class,'PerformDeletePakaian'])->middleware('AgentRoleMiddleware');

    // customer menu
    Route::get('/dashboard/customer/category',[CustomerController::class,'ShowKategori']);
    Route::get('/dashboard/customer/category/{id}',[CustomerController::class,'PakaianBasedKategori']);
    Route::get('/dashboard/customer/category/pakaian/{id2}',[CustomerController::class,'DetailBasedPakaian']);
    Route::post('/dashboard/customer/category/pakaian/buy',[CustomerController::class,'BuyPakaian']);
});