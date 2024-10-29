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

Route::get('/', [ShopController::class, 'index'])->name('shops.index'); // 飲食店一覧
Route::get('/detail/{id}', [ShopController::class, 'showDetailForm'])->name('shops.detail'); // 飲食店詳細

Route::get('/shops/search', [ShopController::class, 'search'])->name('shops.search'); // 検索機能


Route::post('/favorites/{shop}/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::post('/reservations/{shop_id}/confirm', [ReservationController::class, 'confirm'])->name('shops.reservation.confirm');
Route::post('/reservations/{shop_id}/add', [ReservationController::class, 'addReservation'])->name('shops.reservation.add'); // 予約追加
Route::delete('/reservations/{id}', [ReservationController::class, 'delete'])->name('reservations.delete');// 予約削除
Route::get('/done', function() {
    return view('shops.done');
})->name('shops.reservation.done'); // 予約完了ページ

