<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
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
use App\Http\Controllers\Data\HotelController;
use App\Http\Controllers\Data\NotifController;
use App\Http\Controllers\Data\OwnerCarProfileController;
use App\Http\Controllers\Data\OwnerHotelProfileController;
use App\Http\Controllers\Data\OwnerSouvenirProfileController;
use App\Http\Controllers\Data\OwnerTourProfileController;
use App\Http\Controllers\Data\OwnerWorshipProfileController;
use App\Http\Controllers\Data\PlaceController;
use App\Http\Controllers\Data\RecordController;
use App\Http\Controllers\Data\SouvenirController;
use App\Http\Controllers\Data\TagController;
use App\Http\Controllers\Data\TourController;
use App\Http\Controllers\Data\UserController;
use App\Http\Controllers\Data\VerifyController;
use App\Http\Controllers\Data\WorshipController;
use App\Http\Controllers\Owner\OwnerCarController;
use App\Http\Controllers\Owner\OwnerHotelController;
use App\Http\Controllers\Owner\OwnerSouvenirController;
use App\Http\Controllers\Owner\OwnerTourController;
use App\Http\Controllers\Owner\OwnerWorshipController;
use App\Services\WorshipService;
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

// view owner tour
Route::group(['prefix' => 'owner-tour', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [OwnerTourController::class, 'dashboard']);

    // CRUD Tempat
    Route::get('/wisata', [OwnerTourController::class, 'index']);
    Route::get('/tambah-tempat', [OwnerTourController::class, 'tambahTempat']);
    Route::get('/edit-wisata/{id}', [OwnerTourController::class, 'editTempat']);
    Route::get('/wisata/{id}', [OwnerTourController::class, 'detail']);

    // pengaturan
    Route::get('/edit-profil', [OwnerTourController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerTourController::class, 'gantiPassword']);
});

// view owner hotel
Route::group(['prefix' => 'owner-hotel', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [OwnerHotelController::class, 'dashboard']);

    // CRUD Hotel
    Route::get('/hotel', [OwnerHotelController::class, 'hotel']);
    Route::get('/tambah-hotel', [OwnerHotelController::class, 'tambahHotel']);
    Route::get('/edit-hotel/{id}', [OwnerHotelController::class, 'editHotel']);
    Route::get('/hotel/{id}', [OwnerHotelController::class, 'detail']);

    // pengaturan
    Route::get('/edit-profil', [OwnerHotelController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerHotelController::class, 'gantiPassword']);
});

// view owner car
Route::group(['prefix' => 'owner-car', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [OwnerCarController::class, 'dashboard']);

    // CRUD car
    Route::get('/mobil', [OwnerCarController::class, 'index']);
    Route::get('/tambah-mobil', [OwnerCarController::class, 'tambahMobil']);
    Route::get('/tambah-gambar-mobil/{id}', [OwnerCarController::class, 'tambahGambarMobil']);
    Route::get('/mobil/{id}', [OwnerCarController::class, 'detailMobil']);
    Route::get('/edit-mobil/{id}', [OwnerCarController::class, 'editMobil']);

    // CRUD Driver
    Route::get('/sopir', [OwnerCarController::class, 'driver']);
    Route::get('/tambah-sopir', [OwnerCarController::class, 'tambahSopir']);
    Route::get('/edit-sopir/{id}', [OwnerCarController::class, 'editSopir']);

    // rental
    Route::get('/daftar-rental', [OwnerCarController::class, 'rentalList']);

    // pengaturan
    Route::get('/edit-profil', [OwnerCarController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerCarController::class, 'gantiPassword']);
});

// view owner souvenir
Route::group(['prefix' => 'owner-souvenir', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [OwnerSouvenirController::class, 'dashboard']);

    // CRUD Souvenir
    Route::get('/souvenir', [OwnerSouvenirController::class, 'souvenir']);
    Route::get('/souvenir/{id}', [OwnerSouvenirController::class, 'detailSouvenir']);
    Route::get('/tambah-souvenir', [OwnerSouvenirController::class, 'tambahSouvenir']);
    Route::get('/edit-souvenir/{id}', [OwnerSouvenirController::class, 'editSouvenir']);

    // pengaturan
    Route::get('/edit-profil', [OwnerSouvenirController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerSouvenirController::class, 'gantiPassword']);
});

// view owner worship
Route::group(['prefix' => 'owner-worship', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [OwnerWorshipController::class, 'dashboard']);

    // CRUD worship
    Route::get('/tempat-ibadah', [OwnerWorshipController::class, 'tempatIbadah']);
    Route::get('/tambah-tempat-ibadah', [OwnerWorshipController::class, 'tambahTempat']);
    Route::get('/tempat-ibadah/{id}', [OwnerWorshipController::class, 'detail']);
    Route::get('/edit-tempat-ibadah/{id}', [OwnerWorshipController::class, 'editTempat']);

    // pengaturan
    Route::get('/edit-profil', [OwnerWorshipController::class, 'editProfil']);
    Route::get('/ganti-password', [OwnerWorshipController::class, 'gantiPassword']);
});


// data
Route::group(['prefix' => 'data'], function() {
    // upload image to gallery
    Route::post('/upload-picture', [GalleryController::class, 'uploadPicture']);
    Route::post('/upload-hotel-picture', [GalleryController::class, 'uploadHotelPicture']);
    Route::post('/upload-car-picture', [GalleryController::class, 'uploadCarPicture']);
    Route::post('/upload-souvenir-picture', [GalleryController::class, 'uploadSouvenirPicture']);
    Route::post('/upload-worship-picture', [GalleryController::class, 'uploadWorshipPicture']);
    Route::delete('/delete-picture/{id}', [GalleryController::class, 'delPicture']);

    // get all
    Route::get('/wisata', [TourController::class, 'index']);
    Route::get('/hotel', [HotelController::class, 'index']);
    Route::get('/souvenir', [SouvenirController::class, 'index']);
    Route::get('/tempat-ibadah', [WorshipController::class, 'index']);
    Route::get('/all/mobil/', [CarController::class, 'getAll']);
    Route::get('/all/mobil/{user_id}', [CarController::class, 'index']);
    Route::get('/all/driver/{user_id}', [DriverController::class, 'index']);

    Route::get('/tag', [TagController::class, 'index']);
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
    Route::get('/notifications/{user_id}', [NotifController::class, 'index']);
    // get all verify/unverify data
    Route::get('/verify-places', [PlaceController::class, 'verifyPlaces']); // get all verify places
    Route::get('/unverified-places', [PlaceController::class, 'unverifiedPlaces']); // get all unverified places
    Route::get('/verify-cars', [CarController::class, 'verifyCars']); // get all verify cars
    Route::get('/unverified-cars', [CarController::class, 'unverifiedCars']); // get all unverified cars
    Route::get('/all/admin', [UserController::class, 'allAdmin']);
    Route::get('/all/owner', [UserController::class, 'allOwner']);

    // search
    // Route::get('/wisata/{search}', [PlaceController::class, 'searchTours']);
    // Route::get('/hotel/{search}', [PlaceController::class, 'searchHotels']);
    Route::get('/tempat-ibadah/{search}', [PlaceController::class, 'searchWorships']);

    // get place by tag
    Route::get('/wisata-tag/{idTag}', [PlaceController::class, 'tagTours']);
    Route::get('/hotel-tag/{idTag}', [PlaceController::class, 'tagHotels']);
    Route::get('/tempat-ibadah-tag/{idTag}', [PlaceController::class, 'tagWorships']);
    Route::get('/souvenir-tag/{idTag}', [PlaceController::class, 'tagSouvenirs']);

    // add data
    Route::group(['prefix' => 'add'], function() {
        Route::post('/tour', [TourController::class, 'store']);
        Route::post('/hotel', [HotelController::class, 'store']);
        Route::post('/car', [CarController::class, 'store']);
        Route::post('/souvenir', [SouvenirController::class, 'store']);
        Route::post('/worship', [WorshipController::class, 'store']);
        Route::post('/driver', [DriverController::class, 'store']);
        Route::post('/record', [RecordController::class, 'store']);

        Route::post('/tag', [TagController::class, 'store']);
    });

    // get detail
    Route::get('/wisata/{id}', [TourController::class, 'show']);
    Route::get('/hotel/{id}', [HotelController::class, 'show']);
    Route::get('/souvenir/{id}', [SouvenirController::class, 'show']);
    Route::get('/mobil-baru/{user_id}', [CarController::class, 'newCar']);
    Route::get('/mobil/{id}', [CarController::class, 'show']);
    Route::get('/worship/{id}', [WorshipController::class, 'show']);
    Route::get('/backpacker/{id}', [BackpackerController::class, 'show']);

    Route::get('/driver/{id}', [DriverController::class, 'show']);

    // update
    Route::group(['prefix' => 'update'], function() {
        Route::post('/tour/{id}', [TourController::class, 'update']);
        Route::post('/hotel/{id}', [HotelController::class, 'update']);
        Route::post('/souvenir/{id}', [SouvenirController::class, 'update']);
        Route::post('/worship/{id}', [WorshipController::class, 'update']);
        Route::put('/mobil/{id}', [CarController::class, 'update']);
    });

    // delete data
    Route::group(['prefix' => 'delete'], function() {
        Route::delete('/tour/{id}', [TourController::class, 'destroy']);
        Route::delete('/hotel/{id}', [HotelController::class, 'destroy']);
        Route::delete('/tag/{id}', [TagController::class, 'destroy']);
        Route::delete('/car/{id}', [CarController::class, 'destroy']);
        Route::delete('/souvenir/{id}', [SouvenirController::class, 'destroy']);
        Route::delete('/worship/{id}', [WorshipController::class, 'destroy']);
    });

    // verify data
    Route::put('/verify/place/{id}', [VerifyController::class, 'verifyPlace']);
    Route::put('/unverify/place/{id}', [VerifyController::class, 'unverifyPlace']);
    Route::put('/verify/car/{id}', [VerifyController::class, 'verifyCar']);
    Route::put('/unverify/car/{id}', [VerifyController::class, 'unverifyCar']);

    // settings
    Route::group(['prefix' => 'pengaturan'], function() {
        // get detail
        Route::get('/owner-tour/{email}', [OwnerTourProfileController::class, 'show']);
        Route::get('/owner-hotel/{email}', [OwnerHotelProfileController::class, 'show']);
        Route::get('/owner-car/{email}', [OwnerCarProfileController::class, 'show']);
        Route::get('/owner-souvenir/{email}', [OwnerSouvenirProfileController::class, 'show']);
        Route::get('/owner-worship/{email}', [OwnerWorshipProfileController::class, 'show']);

        // update
        Route::group(['prefix' => 'update'], function() {
            Route::group(['prefix' => 'owner-tour'], function() {
                Route::put('/edit-profile/{email}', [OwnerTourProfileController::class, 'update']);
                Route::put('/ganti-password', [OwnerTourProfileController::class, 'gantiPass']);
                Route::post('/ganti-foto/{email}', [OwnerTourProfileController::class, 'updateFoto']);
            });

            Route::group(['prefix' => 'owner-hotel'], function() {
                Route::put('/edit-profile/{email}', [OwnerHotelProfileController::class, 'update']);
                Route::put('/ganti-password', [OwnerHotelProfileController::class, 'gantiPass']);
                Route::post('/ganti-foto/{email}', [OwnerHotelProfileController::class, 'updateFoto']);
            });

            Route::group(['prefix' => 'owner-car'], function() {
                Route::put('/edit-profile/{email}', [OwnerCarProfileController::class, 'update']);
                Route::put('/ganti-password', [OwnerCarProfileController::class, 'gantiPass']);
                Route::post('/ganti-foto/{email}', [OwnerCarProfileController::class, 'updateFoto']);
            });

            Route::group(['prefix' => 'owner-souvenir'], function() {
                Route::put('/edit-profile/{email}', [OwnerSouvenirProfileController::class, 'update']);
                Route::put('/ganti-password', [OwnerSouvenirProfileController::class, 'gantiPass']);
                Route::post('/ganti-foto/{email}', [OwnerSouvenirProfileController::class, 'updateFoto']);
            });

            Route::group(['prefix' => 'owner-worship'], function() {
                Route::put('/edit-profile/{email}', [OwnerWorshipProfileController::class, 'update']);
                Route::put('/ganti-password', [OwnerWorshipProfileController::class, 'gantiPass']);
                Route::post('/ganti-foto/{email}', [OwnerWorshipProfileController::class, 'updateFoto']);
            });
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

// Admin Auth
// Route::group(['prefix' => 'admin'], function() {
//     Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
//     Route::post('/login', [AdminLoginController::class, 'login'])->middleware('guest');
// });

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
