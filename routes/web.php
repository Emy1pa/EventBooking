<?php

use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/events/create', function () {
    $categories = \App\Models\Category::all();
    return view('events.create', compact('categories'));
});

Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{event}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::get('/utilisateur/index', [UtilisateurController::class, 'index'])->name('utilisateur.index');


// Catgegory Routes :
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
