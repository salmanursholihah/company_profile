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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/team', function () {
    return view('team');
})->name('team');


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


// Halaman contact untuk user/public
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Submit form contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/e-katalog', [KatalogController::class, 'index'])->name('e-katalog');


// Route::prefix('admin')->middleware('auth')->group(function () {

//     /// Dashboard & profile update untuk admin & vendor
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard', [
//             'usersCount' => 120,
//             'subsCount' => 45,
//         ]);
//     })->name('admin.dashboard');

//     // Route::get('/profile_updates', function(){
//     //     return view('admin.profile.update');
//     // })->name('admin.profile.update');

//     /// Logout
//     Route::get('/logout', function(){
//         return view('auth.login');
//     })->name('logout');


//     ///route khusus admin
// Route::middleware(['auth','role:super_admin'])->group(function () {
//     Route::get('/users', function () {
//         return view('admin.users.index');
//     })->name('admin.users.index');

//     Route::get('/contacts', function () {
//         return view('admin.contacts.index');
//     })->name('admin.contacts.index');

//     Route::get('/admin_profiles', function(){
//         return view('admin.profile.admin_profil');
//     })->name('admin.profile.admin_profile');

//     Route::get('/setting', function(){
//         return view('admin.setting');
//     })->name('admin.setting');
// });
// ///route khusus vendor
// Route::middleware(['auth','role:vendor'])->group(function () {
//     Route::get('/product_vendors', function(){
//         return view('admin.product_vendor.index');
//     })->name('admin.product_vendor.index');

//     Route::get('/vendor_profiles', function(){
//         return view('admin.profile.vendor_profile');
//     })->name('admin.profile.vendor_profile');
// });
// });


Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard & profile update untuk admin & vendor
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'usersCount' => 120,
            'subsCount' => 45,
        ]);
    })->name('admin.dashboard');

    /// Logout
    Route::get('/logout', function(){
        return view('auth.login');
    })->name('logout');

    /// Routes khusus admin
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/users', function () {
            return view('admin.users.index');
        })->name('admin.users.index');

        Route::get('/contacts', function () {
            return view('admin.contacts.index');
        })->name('admin.contacts.index');

        Route::get('/admin_profiles', function(){
            return view('admin.profile.admin_profile');
        })->name('admin.profile.admin_profile');

        Route::get('/setting', function(){
            return view('admin.setting');
        })->name('admin.setting');
    });

    /// Routes khusus vendor
    Route::middleware('role:vendor')->group(function () {
        Route::get('/product_vendors', function(){
            return view('admin.product_vendor.index');
        })->name('admin.product_vendor.index');

        Route::get('/vendor_profiles', function(){
            return view('admin.profile.vendor_profile');
        })->name('admin.profile.vendor_profile');
    });

});



///untuk vendor dan admin
Route::get('logout', function(){
    return view('auth.login');
})->name('logout');



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



/////route crud admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('katalogs', AdminKatalogController::class);
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('users', AdminUserController::class);
});


Route::prefix('admin')->group(function () {
    Route::resource('vendors', AdminVendorController::class, ['as' => 'admin']);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('contacts', AdminContactController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blogs', AdminBlogController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product_vendor', AdminProductVendorController::class);
});

Route::middleware('auth')->group(function() {
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});

