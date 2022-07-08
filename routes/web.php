<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
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

Route::get('/', [HomeController::class, 'landing']);

Auth::routes();
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('logs', [LogViewerController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/plan/{id}', [HomeController::class, 'plan'])->name('plan');
    Route::post('/plan/{id}', [HomeController::class, 'store']);
    Route::get('/transactions', [HomeController::class, 'transactions'])->name('transactions');
    Route::post('/transaction/{id}', [HomeController::class, 'activeTransaction'])->name('transaction');
    Route::get('/complete', [HomeController::class, 'complete'])->name('complete');
    Route::post('/complete', [HomeController::class, 'completeProfile']);
    Route::get('/click', [HomeController::class, 'click'])->name('click');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profile/update/{id}', [HomeController::class, 'updateProfile'])->name('update.profile');

    Route::get('/events', [HomeController::class, 'events'])->name('events');
});

