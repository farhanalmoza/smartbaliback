<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Data\PlaceController;
use App\Http\Controllers\Data\ProfileController;
use App\Http\Controllers\Data\TagController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    Route::get('/edit-profil', [AdminController::class, 'editProfil']);
    Route::get('/ganti-password', [AdminController::class, 'gantiPassword']);
});

// data
Route::group(['prefix' => 'data', 'middleware' => ['auth', 'verified']], function() {
    // get all
    Route::get('/wisata', [PlaceController::class, 'tours']);
    Route::get('/hotel', [PlaceController::class, 'hotels']);
    Route::get('/tempat-ibadah', [PlaceController::class, 'worships']);
    Route::get('/tag', [TagController::class, 'index']);
    // add data
    Route::group(['prefix' => 'add'], function() {
        Route::post('/tag', [TagController::class, 'store']);
        Route::post('/place', [PlaceController::class, 'store']);
    });
    // delete data
    Route::group(['prefix' => 'delete'], function() {
        Route::delete('/place/{id}', [PlaceController::class, 'destroy']);
    });

    // settings
    Route::group(['prefix' => 'pengaturan'], function() {
        // get detail
        Route::get('/profile/{email}', [ProfileController::class, 'show']);

        // update
        Route::group(['prefix' => 'update'], function() {
            Route::put('/edit-profile/{email}', [ProfileController::class, 'update']);
            Route::post('/ganti-foto/{email}', [ProfileController::class, 'updateFoto']);
        });
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
