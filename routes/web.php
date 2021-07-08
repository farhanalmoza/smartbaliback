<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Data\PlaceController;
use App\Http\Controllers\Data\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// views
Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/wisata', [AdminController::class, 'wisata']);
    Route::get('/hotel', [AdminController::class, 'hotel']);
    Route::get('/tempat-ibadah', [AdminController::class, 'tempatIbadah']);
    Route::get('/tambah-tempat', [AdminController::class, 'tambahTempat']);
    Route::get('/daftar-pengguna', [AdminController::class, 'daftarPengguna']);
});

// data
Route::group(['prefix' => 'data'], function() {
    // get all
    Route::get('/wisata', [PlaceController::class, 'tours']);
    // add data
    Route::group(['prefix' => 'add'], function() {
        Route::post('/tag', [TagController::class, 'store']);
    });
});
