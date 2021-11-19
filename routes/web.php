<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Data\BackpackerController;
use App\Http\Controllers\Data\CarController;
use App\Http\Controllers\Data\DriverController;
use App\Http\Controllers\Data\GalleryController;
use App\Http\Controllers\Data\NotifController;
use App\Http\Controllers\Data\PlaceController;
use App\Http\Controllers\Data\ProfileController;
use App\Http\Controllers\Data\TagController;
use App\Http\Controllers\Data\UserController;
use App\Http\Controllers\Data\VerifyController;
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
    return view('welcome');
});

// views
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'is_admin']], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // daftar tempat
    Route::get('/wisata', [AdminController::class, 'wisata']);
    Route::get('/hotel', [AdminController::class, 'hotel']);
    Route::get('/tempat-ibadah', [AdminController::class, 'tempatIbadah']);
    Route::get('/souvenir', [AdminController::class, 'souvenir']);

    // detail
    Route::get('/tempat/{slug}/{id}', [AdminController::class, 'detailTempat']);
    Route::get('/mobil/{id}', [AdminController::class, 'detailMobil']);

    // verifikasi
    Route::get('/verifikasi/tempat', [AdminController::class, 'verifikasiTempat']);
    Route::get('/verifikasi/mobil', [AdminController::class, 'verifikasiMobil']);

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

    // rental mobil
    Route::get('/mobil', [OwnerController::class, 'car']);
    Route::get('/sopir', [OwnerController::class, 'driver']);
    Route::get('/daftar-rental', [OwnerController::class, 'rentalList']);

    // CRUD Mobil
    Route::get('/tambah-mobil', [OwnerController::class, 'tambahMobil']);
    Route::get('/tambah-gambar-mobil/{id}', [OwnerController::class, 'tambahGambarMobil']);
    Route::get('/mobil/{id}', [OwnerController::class, 'detailMobil']);
    Route::get('/edit-mobil/{id}', [OwnerController::class, 'editMobil']);

    // CRUD Sopir
    Route::get('/tambah-sopir', [OwnerController::class, 'tambahSopir']);
    Route::get('/edit-sopir/{id}', [OwnerController::class, 'editSopir']);

    // CRUD Tempat
    Route::get('/tambah-tempat', [OwnerController::class, 'tambahTempat']);
    Route::get('/edit-tempat/{id}', [OwnerController::class, 'editTempat']);
    Route::get('/tempat/{id}', [OwnerController::class, 'detailTempat']);

    // pengaturan
    Route::get('/edit-profil', [OwnerController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerController::class, 'gantiPassword']);
});

// data
Route::group(['prefix' => 'data'], function() {
    // upload image to gallery
    Route::post('/upload-picture', [GalleryController::class, 'uploadPicture']);
    Route::post('/upload-car-picture', [GalleryController::class, 'uploadCarPicture']);
    Route::delete('/delete-picture/{id}', [GalleryController::class, 'delPicture']);

    // get all
    Route::get('/wisata', [PlaceController::class, 'tours']);
    Route::get('/hotel', [PlaceController::class, 'hotels']);
    Route::get('/tempat-ibadah', [PlaceController::class, 'worships']);
    Route::get('/souvenir', [PlaceController::class, 'souvenirs']);
    Route::get('/tag', [TagController::class, 'index']);
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
    Route::get('/notifications/{user_id}', [NotifController::class, 'index']);
    Route::get('/all/mobil/{user_id}', [CarController::class, 'index']);
    Route::get('/all/driver/{user_id}', [DriverController::class, 'index']);
    // get all verify/unverify data
    Route::get('/verify-places', [PlaceController::class, 'verifyPlaces']); // get all verify places
    Route::get('/unverified-places', [PlaceController::class, 'unverifiedPlaces']); // get all unverified places
    Route::get('/verify-cars', [CarController::class, 'verifyCars']); // get all verify cars
    Route::get('/unverified-cars', [CarController::class, 'unverifiedCars']); // get all unverified cars
    Route::get('/all/admin', [UserController::class, 'allAdmin']);
    Route::get('/all/owner', [UserController::class, 'allOwner']);

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
        Route::post('/car', [CarController::class, 'store']);
        Route::post('/driver', [DriverController::class, 'store']);
        Route::post('/backpacker', [BackpackerController::class, 'store']);
    });

    // get detail
    Route::get('/place/{id}', [PlaceController::class, 'show']);
    Route::get('/mobil-baru/{user_id}', [CarController::class, 'newCar']);
    Route::get('/mobil/{id}', [CarController::class, 'show']);
    Route::get('/driver/{id}', [DriverController::class, 'show']);

    // update
    Route::group(['prefix' => 'update'], function() {
        Route::post('/place/{id}', [PlaceController::class, 'update']);
        Route::put('/mobil/{id}', [CarController::class, 'update']);
    });

    // delete data
    Route::group(['prefix' => 'delete'], function() {
        Route::delete('/place/{id}', [PlaceController::class, 'destroy']);
        Route::delete('/tag/{id}', [TagController::class, 'destroy']);
        Route::delete('/car/{id}', [CarController::class, 'destroy']);
    });

    // verify data
    Route::put('/verify/place/{id}', [VerifyController::class, 'verifyPlace']);
    Route::put('/unverify/place/{id}', [VerifyController::class, 'unverifyPlace']);
    Route::put('/verify/car/{id}', [VerifyController::class, 'verifyCar']);
    Route::put('/unverify/car/{id}', [VerifyController::class, 'unverifyCar']);

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

// auth list
// Auth::routes(['verify' => true]);
Route::group(['prefix' => 'email'], function() {
    Route::post('/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware('auth');
    Route::get('/verify', [VerificationController::class, 'show'])->name('verification.notice')->middleware('auth');
    Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'password'], function() {
    Route::get('/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm')->middleware('auth');
    Route::post('/confirm', [ConfirmPasswordController::class, 'confirm'])->middleware('auth');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});
Route::get('/register', [RegisterController::class, 'showSelectType'])->name('register.select')->middleware('guest');
Route::get('/register/{type}', [RegisterController::class, 'showRegistrationForm'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
