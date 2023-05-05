<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FilmController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/booking', [BookingController::class, 'index'])->name('indexBooking');
Route::get('/create-booking',[BookingController::class, 'create'])->name('createBooking');
Route::post('/store-booking',[BookingController::class, 'store'])->name('storeBooking');
Route::get('/edit-booking/{id}',[BookingController::class, 'edit'])->name('editBooking');
Route::post('/update-booking/{id}',[BookingController::class, 'update'])->name('updateBooking');
Route::post('/delete-booking/{id}',[BookingController::class, 'delete'])->name('deleteBooking');

Route::get('/booking/export_excel', [BookingController::class,'export_excel'])->name('downloadExcel');
Route::get('/booking/cetak_pdf', [BookingController::class,'export_pdf'])->name('exportPdf');

Route::get('/film',[FilmController::class, 'index'])->name('indexFilm');
Route::get('/create-film',[FilmController::class, 'create'])->name('createFilm');
Route::post('/store-film',[FilmController::class, 'store'])->name('storeFilm');
Route::get('/edit-film/{id}',[FilmController::class, 'edit'])->name('editFilm');
Route::post('/update-film/{id}',[FilmController::class, 'update'])->name('updateFilm');
Route::post('/delete-film/{id}',[FilmController::class, 'delete'])->name('deleteFilm');
