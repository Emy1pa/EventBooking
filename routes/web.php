<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StatisticsController;

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
// REGISTERS ROUTE
Route::get('/registerr', function () {
    return view('register');
});
Route::post('/register', [RegisterController::class, 'store']);

// LOGIN ROUTES

Route::get('/login', [LoginController::class, 'show'])->name('logins');
Route::post('/login', [LoginController::class, 'login'])->name('logiins');

// LOGOUT ROUTE

Route::post('/logout', [LoginController::class, 'logout']);

// EVENTS ROUTES
Route::middleware(['role:organisateur'])->group(function () {
Route::get('/events/index', [EventController::class, 'index'])->name('events.index');
Route::post('/events/{id}', [EventController::class, 'UpdateStatus'])->name('status.update');

Route::post('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/events/create', function () {
    $categories = \App\Models\Category::all();
    return view('events.create', compact('categories'));
});
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{event}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

});

// ADMIN ROUTES :
Route::middleware(['role:admin'])->group(function () {
Route::get('admin/categories/index', [CategoryController::class, 'index'])->name('categories.index');
Route::post('admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('admin/categories/create', function (){
    return view('admin.categories.create');
});
Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::get('admin/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/statistics', [StatisticsController::class, 'index'])->name('admin.statistics');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/events', [AdminEventController::class, 'index'])->name('admin.events.index');
Route::post('/events/approve/{event}', [AdminEventController::class, 'approve'])->name('admin.events.approve');
Route::post('/events/reject/{event}', [AdminEventController::class, 'reject'])->name('admin.events.reject');
});
// USER ROUTE
Route::middleware(['role:utilisateur'])->group(function () {
Route::post('/events/reserve/{event}', [ReservationController::class, 'reserve'])->name('events.reserve');
Route::post('/reservations/ticket/{id}', [ReservationController::class, 'generateTicket'])->name('events.ticket');
Route::post('/showticket/{event}', [ReservationController::class, 'showTicket'])->name('showticket');

});
Route::get('/utilisateur/index', [UtilisateurController::class, 'index'])->name('utilisateur.index');


// ForgetPassword
Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');

Route::get('/test', [EventController::class, 'test']);