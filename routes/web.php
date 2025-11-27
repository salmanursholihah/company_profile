<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AdminkatalogController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVendorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminProductVendorController;
use App\Http\Controllers\AdminProfileController;


// Landing pages
Route::get('/', fn() => view('index'))->name('index');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/portfolio', fn() => view('portfolio'))->name('portfolio');
Route::get('/produksi_pabrikasi_ipal', fn() => view('produksi_pabrikasi_ipal'))->name('produksi_pabrikasi_ipal');
Route::get('/perawatan', fn() => view('perawatan'))->name('perawatan');
Route::get('/instalasi', fn() => view('instalasi'))->name('instalasi');
Route::get('/konstruksi_pembangunan', fn() => view('konstruksi_pembangunan'))->name('konstruksi_pembangunan');
Route::get('/team', fn() => view('team'))->name('team');
Route::get('/backend', fn() => view('backend'))->name('backend');
Route::get('/testing', fn() => view('testing'))->name('testing');
// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Product & Katalog
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/e-katalog', [KatalogController::class, 'index'])->name('e-katalog');



/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

// Login / Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout (satu untuk semua role)
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});



/*
|--------------------------------------------------------------------------
| ADMIN & VENDOR PANEL (DASHBOARD)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard (akses admin & vendor)
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'usersCount' => 120,
            'subsCount'  => 45,
        ]);
    })->name('admin.dashboard');

    /*
    |--------------------------------------
    | SUPER ADMIN ONLY PAGES (VIEW ONLY)
    |--------------------------------------
    */
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/users', fn() => view('admin.users.index'))->name('admin.users.index');
        Route::get('/contacts', fn() => view('admin.contacts.index'))->name('admin.contacts.index');
        Route::get('/admin_profiles', fn() => view('admin.profile.admin_profile'))->name('admin.profile.admin_profile');
        Route::get('/setting', fn() => view('admin.setting'))->name('admin.setting');
    });

    /*
    |--------------------------------------
    | VENDOR ONLY PAGES (VIEW ONLY)
    |--------------------------------------
    */
    Route::middleware('role:vendor')->group(function () {
        Route::get('/vendor_profiles', fn() => view('admin.profile.vendor_profile'))->name('admin.profile.vendor_profile');
    });
});



/*
|--------------------------------------------------------------------------
| ADMIN CRUD RESOURCES
|--------------------------------------------------------------------------
|
| Semua resource admin dijadikan satu group.
| Tidak ada route manual duplikat yang memakai nama sama.
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // SUPER ADMIN CRUD
    Route::middleware('role:super_admin')->group(function () {
        Route::resource('products', AdminProductController::class);
        Route::resource('katalogs', AdminKatalogController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('contacts', AdminContactController::class);
        Route::resource('blogs', AdminBlogController::class);
        Route::resource('vendors', AdminVendorController::class);
    });

    // VENDOR CRUD
    Route::middleware('role:vendor')->group(function () {
        Route::resource('product_vendor', AdminProductVendorController::class);
    });
});
