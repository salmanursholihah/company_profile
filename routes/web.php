<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AdminkatalogController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVendorController;

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


Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/e-katalog', [KatalogController::class, 'index'])->name('e-katalog');


Route::get('logout', function(){
    return view('login');
})->name('logout');







// /////routing untuk admin
// // Admin routes
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard', [
//             'usersCount' => 120,
//             'subsCount' => 45,
//         ]);
//     })->name('admin.dashboard');

//     Route::get('/user.index', function () {
//         return view('admin.user.index');
//     })->name('admin.user.index');

//     Route::get('/product.index', function () {
//         return view('admin.product.index');
//     })->name('admin.product.index');

//     Route::get('/blog.index', function () {
//         return view('admin.blog.index');
//     })->name('admin.blog.index');


//     Route::get('/vendor.index', function () {
//         return view('admin.vendor.index');
//     })->name('admin.vendor.index');

//     Route::get('/contact.index', function () {
//         return view('admin.contact.index');
//     })->name('admin.contact.index');


//     Route::get('/setting', function () {
//         return view('admin.setting');
//     })->name('admin.setting');
// });



// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'usersCount' => 120,
            'subsCount' => 45,
        ]);
    })->name('admin.dashboard');

    Route::get('/setting', function(){
        return view('admin.setting');
    })->name('admin.setting');

    Route::get('/users', function () {
        return view('admin.user.index');
    })->name('admin.user.index');

    // Route::get('/katalog', function () {
    //     return view('admin.katalog.index');
    // })->name('admin.katalog.index');

    // Route::get('/products', function () {
    //     return view('admin.product.index');
    // })->name('admin.product.index');

    Route::get('/product_vendors', function(){
        return view('admin.product_saya.index');
    })->name('admin.product_saya.index');


    Route::get('/blogs', function () {
        return view('admin.blog.index');
    })->name('admin.blog.index');

    // Route::get('/vendors', function () {
    //     return view('admin.vendor.index');
    // })->name('admin.vendor.index');

    Route::get('/contacts', function () {
        return view('admin.contact.index');
    })->name('admin.contact.index');


    Route::get('/admin_profiles', function(){
        return view('admin.profile.admin_profil');
    })->name('admin.profile.admin_profile');

    Route::get('/vendor_profiles', function(){
        return view('admin.profile.vendor_profile');
    })->name('admin.profile.vendor_profile');
    
    Route::get('/profile_updates', function(){
        return view('admin.profile.update');
    })->name('admin.profile.update');
});


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


