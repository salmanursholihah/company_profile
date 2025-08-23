<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

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
Route::get('/e-katalog', function () {
    return view('e-katalog');
})->name('e-katalog');

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

    Route::get('/products', function () {
        return view('admin.product.index');
    })->name('admin.product.index');


    Route::get('/product_vendors', function(){
        return view('admin.product_saya.index');
    })->name('admin.product_saya.index');


    Route::get('/blogs', function () {
        return view('admin.blog.index');
    })->name('admin.blog.index');

    Route::get('/vendors', function () {
        return view('admin.vendor.index');
    })->name('admin.vendor.index');

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




// // routes/web.php
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard', [
//             'productsCount' => 5483,
//             'ordersCount' => 2859,
//             'stockCount' => 5483,
//             'outOfStock' => 38,
//         ]);
//     })->name('admin.dashboard');
// });


// // routes/web.php
// Route::prefix('vendor')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('vendor.dashboard', [
//             'productsCount' => 5483,
//             'ordersCount' => 2859,
//             'stockCount' => 5483,
//             'outOfStock' => 38,
//         ]);
//     })->name('vendor.dashboard');
// });

