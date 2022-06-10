<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/producto', [ProductoController::class, 'index']);
*/
Auth::routes(['verify'=>true]);





//Route Hooks - Do not delete//
	Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('giftCards', 'livewire.GiftCards.index')->middleware('auth');
	Route::view('wishlistdetails', 'livewire.wishlistdetails.index')->middleware(['auth', 'verified']);
	Route::view('wishlist', 'livewire.wishlists.index')->middleware(['auth', 'verified']);
	Route::view('ciudades', 'livewire.ciudades.index')->middleware(['auth', 'verified']);
	Route::view('clientes', 'livewire.clientes.index')->middleware(['auth', 'verified']);
	Route::view('categorias', 'livewire.categorias.index')->middleware(['auth', 'verified']);
	Route::view('productos', 'livewire.productos.index')->middleware(['auth', 'verified']);