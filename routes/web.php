<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ForgetPasswordManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/registerr', function () {
    return view('register');
});
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'show'])->name('logins');
Route::post('/login', [LoginController::class, 'login'])->name('logiins');

Route::get('/events/index', [EventController::class, 'index']);
Route::post('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

Route::get('/events/create', function (){
    return view('events.create');
});