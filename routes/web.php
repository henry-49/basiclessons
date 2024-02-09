<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/services', [PagesController::class, 'services'])->name('services');

Route::get('/show/{id}', [PagesController::class, 'show']);

Route::get('/create', [PagesController::class, 'create'])->name('create');

Route::post('/saveproduct', [PagesController::class, 'saveproduct']);

Route::get('/edit/{id}', [PagesController::class, 'editproduct']);

Route::post('/updateproduct', [PagesController::class, 'updateproduct']);

Route::get('/delete/{id}', [PagesController::class, 'deleteproduct']);

Route::resource('products', ProductController::class);