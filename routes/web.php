<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Data\GalleryController;
use App\Http\Controllers\Data\PlaceController;
use App\Http\Controllers\Data\ProfileController;
use App\Http\Controllers\Data\TagController;
use App\Http\Controllers\Owner\OwnerController;
use App\Models\Gallery;
use GuzzleHttp\Middleware;
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
    return redirect('/login');
});

// views
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'is_admin']], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // daftar tempat
    Route::get('/wisata', [AdminController::class, 'wisata']);
    Route::get('/hotel', [AdminController::class, 'hotel']);
    Route::get('/tempat-ibadah', [AdminController::class, 'tempatIbadah']);
    Route::get('/souvenir', [AdminController::class, 'souvenir']);

    // CRUD Tempat
    Route::get('/tempat/{slug}/{id}', [AdminController::class, 'detailTempat']);

    Route::get('/verifikasi', [AdminController::class, 'verifikasi']);

    // list
    Route::get('/daftar-pengguna', [AdminController::class, 'daftarPengguna']);
    Route::get('/daftar-tag', [AdminController::class, 'daftarTag']);

    // pengaturan
    Route::get('/edit-profil', [AdminController::class, 'editProfil']);
    Route::get('/ganti-password', [AdminController::class, 'gantiPassword']);
});

Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [OwnerController::class, 'dashboard']);

    // daftar tempat
    Route::get('/wisata', [OwnerController::class, 'wisata']);
    Route::get('/hotel', [OwnerController::class, 'hotel']);
    Route::get('/tempat-ibadah', [OwnerController::class, 'tempatIbadah']);
    Route::get('/souvenir', [OwnerController::class, 'souvenir']);

    // CRUD Tempat
    Route::get('/tambah-tempat', [OwnerController::class, 'tambahTempat']);
    Route::get('/edit-tempat/{id}', [OwnerController::class, 'editTempat']);

    // pengaturan
    Route::get('/edit-profil', [OwnerController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerController::class, 'gantiPassword']);
});

// data
Route::group(['prefix' => 'data'], function() {
    // upload image to gallery
    Route::post('/upload-picture', [GalleryController::class, 'uploadPicture']);
    Route::delete('/delete-picture/{id}', [GalleryController::class, 'delPicture']);

    // get all
    Route::get('/verify-places', [PlaceController::class, 'verifyPlaces']); // get all verify places
    Route::get('/unverified-places', [PlaceController::class, 'unverifiedPlaces']); // get all unverified places
    Route::get('/wisata', [PlaceController::class, 'tours']);
    Route::get('/hotel', [PlaceController::class, 'hotels']);
    Route::get('/tempat-ibadah', [PlaceController::class, 'worships']);
    Route::get('/souvenir', [PlaceController::class, 'souvenirs']);
    Route::get('/tag', [TagController::class, 'index']);
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');

    // search
    Route::get('/wisata/{search}', [PlaceController::class, 'searchTours']);
    Route::get('/hotel/{search}', [PlaceController::class, 'searchHotels']);
    Route::get('/tempat-ibadah/{search}', [PlaceController::class, 'searchWorships']);

    // get place by tag
    Route::get('/wisata-tag/{idTag}', [PlaceController::class, 'tagTours']);
    Route::get('/hotel-tag/{idTag}', [PlaceController::class, 'tagHotels']);
    Route::get('/tempat-ibadah-tag/{idTag}', [PlaceController::class, 'tagWorships']);
    Route::get('/souvenir-tag/{idTag}', [PlaceController::class, 'tagSouvenirs']);

    // add data
    Route::group(['prefix' => 'add'], function() {
        Route::post('/tag', [TagController::class, 'store']);
        Route::post('/place', [PlaceController::class, 'store']);
    });

    // get detail
    Route::get('/place/{id}', [PlaceController::class, 'show']);

    // update
    Route::group(['prefix' => 'update'], function() {
        Route::post('/place/{id}', [PlaceController::class, 'update']);
    });

    // delete data
    Route::group(['prefix' => 'delete'], function() {
        Route::delete('/place/{id}', [PlaceController::class, 'destroy']);
        Route::delete('/tag/{id}', [TagController::class, 'destroy']);
    });

    // verify data
    Route::put('/verify/place/{id}', [PlaceController::class, 'verify']);
    Route::put('/unverify/place/{id}', [PlaceController::class, 'unverify']);

    // settings
    Route::group(['prefix' => 'pengaturan'], function() {
        // get detail
        Route::get('/profile/{email}', [ProfileController::class, 'show']);

        // update
        Route::group(['prefix' => 'update'], function() {
            Route::put('/edit-profile/{email}', [ProfileController::class, 'update']);
            Route::put('/ganti-password', [ProfileController::class, 'gantiPass']);
            Route::post('/ganti-foto/{email}', [ProfileController::class, 'updateFoto']);
        });
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
