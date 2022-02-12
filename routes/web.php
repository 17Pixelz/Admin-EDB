<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;

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


Route::middleware('token')->group(function (){

    Route::middleware('role:admin')->group(function (){
        Route::get('/', [ HomeController::class, 'index'])->name('dashboard');

        Route::prefix('list')->name('list.')->group(function(){
            Route::get('clients', [ ListingController::class, 'clients'])->name('clients');
            Route::get('comptes', [ ListingController::class, 'comptes'])->name('comptes');
            Route::get('transferts', [ ListingController::class, 'transferts'])->name('transferts');
        });
    });

    Route::middleware('role:agent')->group(function (){
        Route::view('home','pages.notifications')   ->name('home');
        Route::get('/agent', [ AgentController::class, 'transferts'])->name('agent');
        Route::get('/add/client', [ AgentController::class, 'addClient'])->name('client');
        Route::post('/add/client', [ AgentController::class, 'addClientPost'])->name('add.client');

        Route::get('/add/transfert', [ AgentController::class, 'addTransfert'])->name('transfert');
        Route::post('/add/transfert', [ AgentController::class, 'addTransfertPost'])->name('add.transfert');


        Route::post('/updateType', [ AgentController::class, 'updateType'])->name('updateType');

    });

});

Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'loginPost'])->name('loginPost');
