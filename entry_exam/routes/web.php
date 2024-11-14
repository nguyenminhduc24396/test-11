<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\TopController as AdminTopController;
use App\Http\Controllers\Admin\HotelController as AdminHotelController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

/** user screen */
Route::get('/', [TopController::class, 'index'])->name('top');
Route::get('/{prefecture_name_alpha}/hotellist', [HotelController::class, 'showList'])->name('hotelList');
Route::get('/hotel/{hotel_id}', [HotelController::class, 'showDetail'])->name('hotelDetail');


/** admin screen */
Route::get('/admin', [AdminTopController::class, 'index'])->name('adminTop');
Route::get('/admin/hotel/search', [AdminHotelController::class, 'showSearch'])->name('adminHotelSearchPage');
Route::get('/admin/hotel/edit/{hotel_id}', [AdminHotelController::class, 'showEdit'])->name('adminHotelEditPage');
Route::post('/admin/hotel/edit/{hotel_id}/confirm', [AdminHotelController::class, 'editConfirm'])->name('adminHotelEditConfirm');
Route::put('/admin/hotel/edit/{hotel_id}', [AdminHotelController::class, 'edit'])->name('adminHotelEditProcess');
Route::get('/admin/hotel/edit/{hotel_id}/complete', [AdminHotelController::class, 'editComplete'])->name('adminHotelEditComplete');
Route::get('/admin/hotel/create', [AdminHotelController::class, 'showCreate'])->name('adminHotelCreatePage');
Route::post('/admin/hotel/search/result', [AdminHotelController::class, 'searchResult'])->name('adminHotelSearchResult');
Route::post('/admin/hotel/create', [AdminHotelController::class, 'create'])->name('adminHotelCreateProcess');
Route::post('/admin/hotel/delete', [AdminHotelController::class, 'delete'])->name('adminHotelDeleteProcess');
Route::get('/booking/search', [AdminBookingController::class, 'search'])->name('adminBookingSearchPage');
Route::post('/booking/search/result', [AdminBookingController::class, 'searchResults'])->name('adminBookingSearchResults');
