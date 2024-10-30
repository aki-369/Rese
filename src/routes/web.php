<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;

Route::get('/register', [UserController::class, 'showRegisterForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');;
Route::get('/thanks', [UserController::class, 'showThanksForm'])->name('thanks');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/mypage', [UserController::class, 'showMypage'])->name('mypage')->middleware('auth');

Route::get('/', [ShopController::class, 'index'])->name('shops.index');
Route::get('/detail/{id}', [ShopController::class, 'showDetailForm'])->name('shops.detail');

Route::get('/shops/search', [ShopController::class, 'search'])->name('shops.search'); 

Route::post('/favorites/{shop}/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::post('/reservations/{shop_id}/confirm', [ReservationController::class, 'confirm'])->name('shops.reservation.confirm');
Route::post('/reservations/{shop_id}/add', [ReservationController::class, 'addReservation'])->name('shops.reservation.add'); 
Route::delete('/reservations/{id}', [ReservationController::class, 'delete'])->name('reservations.delete');
Route::get('/done', function() {
    return view('shops.done');
})->name('shops.reservation.done'); 

