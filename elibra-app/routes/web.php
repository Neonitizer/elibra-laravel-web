<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\RegisterController;

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

Route::get('/home', [HomeController::class, 'homepage']) -> name('homepage');

Route::get('/register', [RegisterController::class, 'register_page']) -> name('register_page');

Route::post('/register_process', [RegisterController::class,'register_process']) -> name('register_process');


Route::get('/login', [LoginController::class, 'login_page']) -> name('login_page');

Route::post('/login_process', [LoginController::class,'login_process']) -> name('login_process');

Route::get('/logout_process', [LoginController::class, 'logout_process']) -> name('logout_process');


Route::get('/book-list', [BukuController::class, 'book_list_page']) -> name('book_list_page');

Route::get('/book/{idbuku}', [BukuController::class, 'book_page']) -> name('book_page');

Route::get('/delete-book/{idbuku}', [BukuController::class, 'delete_book_process']) -> name('delete_book_process');

Route::get('/add-book', [BukuController::class, 'add_book_page']) -> name('add_book_page');

Route::post('/add_book_process', [BukuController::class,'add_book_process']) -> name('add_book_process');


Route::get('/rules', [PeminjamController::class, 'rules_page']) -> name('rules_page');


Route::get('/user-list', [PeminjamController::class, 'borrower_list_page']) -> name('borrower_list_page');

Route::get('/user-detail/{iduser}', [PeminjamController::class, 'user_detail']) -> name('user_detail');

Route::get('/user-book-remove/{iduser}/{kodepinjam}', [PeminjamController::class, 'user_book_remove']) -> name('user_book_remove');


Route::get('/borrow-history', [PeminjamController::class, 'borrowing_history_page']) -> name('borrow_history_page');

Route::get('/borrow-status', [PeminjamController::class, 'borrowing_status_page']) -> name('borrow_status_page');


Route::get('/choose-book-process/{idbuku}', [PeminjamController::class, 'choose_book_process']) -> name('choose_book_process');