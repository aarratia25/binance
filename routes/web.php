<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('landing');
});

Auth::routes();
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/plan/{id}', [HomeController::class, 'plan'])->name('plan');
    Route::post('/plan/{id}', [HomeController::class, 'store']);
    Route::get('/transactions', [HomeController::class, 'transactions'])->name('transactions');
    Route::get('/complete', [HomeController::class, 'complete'])->name('complete');
    Route::post('/complete', [HomeController::class, 'completeProfile']);
});

