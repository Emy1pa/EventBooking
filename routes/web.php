<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ForgetPasswordManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UtilisateurController;

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

Route::get('/events/index', [EventController::class, 'index'])->name('events.index');
Route::post('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

Route::get('/events/create', function (){
    return view('events.create');
});

Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{event}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

Route::get('/utilisateur/index', [UtilisateurController::class, 'index'])->name('utilisateur.index');
