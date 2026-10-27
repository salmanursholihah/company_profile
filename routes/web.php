<?php

use App\Http\Controllers\AdminUjiLabController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AdminKatalogController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVendorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminProductVendorController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminHalamanUtamaController;
use App\Http\Controllers\AdminVisiMisiController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminFooterController;
use App\Http\Controllers\AdminLegalitasController;
// use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\LandingController;
// use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminPortfolioController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminImageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\Admin\AdminGuideCategoryController;
use App\Http\Controllers\Admin\AdminGuideController;
use App\Http\Controllers\Admin\AdminGuideLessonController;
use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\AdminSubscriptionPlanController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('index');
// Route::get('/about', fn() => view('about'))->name('about');
route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
// Route::get('/portfolio', fn() => view('portfolio'))->name('portfolio');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/produksi_pabrikasi_ipal', fn() => view('produksi_pabrikasi_ipal'))->name('produksi_pabrikasi_ipal');
Route::get('/perawatan', fn() => view('perawatan'))->name('perawatan');
Route::get('/instalasi', fn() => view('instalasi'))->name('instalasi');
Route::get('/konstruksi_pembangunan', fn() => view('konstruksi_pembangunan'))->name('konstruksi_pembangunan');
Route::get('/Commissioning', fn() => view('Commissioning'))->name('Commissioning');
Route::get('/desain_konsultasi', fn() => view('desain_konsultasi'))->name('desain_konsultasi');
Route::get('/fabrikasi_unit', fn() => view('fabrikasi_unit'))->name('fabrikasi_unit');
Route::get('/instalasi_pemasangan', fn() => view('instalasi_pemasangan'))->name('instalasi_pemasangan');
Route::get('/monitoring_pengujian', fn() => view('monitoring_pengujian'))->name('monitoring_pengujian');
Route::get('/operator_training', fn() => view('operator_training'))->name('operator_training');
Route::get('/penyediaan_bahan', fn() => view('penyediaan_bahan'))->name('penyediaan_bahan');
Route::get('/Perawatan_dan_Maintenance', fn() => view('Perawatan_dan_Maintenance'))->name('Perawatan_dan_Maintenance');
Route::get('/renovasi_ipal', fn() => view('renovasi_ipal'))->name('renovasi_ipal');
// Route::get('/team', fn() => view('team'))->name('team');
// Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/backend', fn() => view('backend'))->name('backend');

/* Panduan */
Route::get('/panduan', [\App\Http\Controllers\GuideWebController::class, 'index'])->name('guides.index');
Route::get('/panduan/{slug}', [\App\Http\Controllers\GuideWebController::class, 'show'])->name('guides.show');
Route::get('/panduan/{slug}/materi/{id}', [\App\Http\Controllers\GuideWebController::class, 'lesson'])->whereNumber('id')->name('guides.lesson');
Route::get('/panduan/{slug}/materi/{id}/unduh', [\App\Http\Controllers\GuideWebController::class, 'download'])->whereNumber('id')->name('guides.download');

/* Blog */
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

/* Contact */
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/* Products & Katalog */
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/e-katalog', [KatalogController::class, 'index'])->name('e-katalog');
Route::get('/e-katalog/{id}', [KatalogController::class, 'show'])->name('e-katalog.show');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')
    ->post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/* Profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (Dashboard + Profiles)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        /* Dashboard untuk semua yang login */
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        /* SUPER ADMIN ONLY — VIEW PAGES */
        Route::middleware('role:super_admin')->group(function () {
            Route::view('/users', 'admin.users.index')->name('admin.users.index');
            Route::view('/contacts', 'admin.contacts.index')->name('admin.contacts.index');
            Route::view('/admin_profiles', 'admin.profile.admin_profile')->name('admin.profile.admin_profile');
            // Pengaturan situs: logo, warna, teks (dipakai web & mobile)
            Route::get('/setting', [AdminSettingController::class, 'index'])->name('admin.setting');
            Route::put('/setting', [AdminSettingController::class, 'update'])->name('admin.setting.update');
            Route::post('/setting/reset', [AdminSettingController::class, 'reset'])->name('admin.setting.reset');
        });

        /* VENDOR ONLY — VIEW PAGES */
        Route::middleware('role:vendor')->group(function () {
            Route::view('/vendor_profiles', 'admin.profile.vendor_profile')->name('admin.profile.vendor_profile');
        });
    });

/*
|--------------------------------------------------------------------------
| ADMIN CRUD (Resource Controllers)
|--------------------------------------------------------------------------
|
| Semua CRUD admin cukup satu kali didefinisikan.
| Tidak ada route bentrok, tidak ada resource duplikat.
|
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        /* SUPER ADMIN CRUD */
        Route::middleware('role:super_admin')->group(function () {
            Route::resource('products', AdminProductController::class);
            Route::resource('katalogs', AdminKatalogController::class);
            Route::resource('users', AdminUserController::class);
            Route::resource('contacts', AdminContactController::class);
            Route::resource('vendors', AdminVendorController::class);

            // ABOUT, HALAMAN UTAMA, VISI MISI, SERVICES, FOOTER → super admin only
            Route::resource('about', AdminAboutController::class);

            Route::post('/about/store-about', [AdminAboutController::class, 'storeAbout'])
                ->name('about.storeAbout');



            Route::post('/about/store-legalitas', [AdminAboutController::class, 'storeLegalitas'])
                ->name('about.storeLegalitas');
            Route::get('/about/legalitas/{id}/edit', [AdminAboutController::class, 'editLegalitas'])->name('about.editLegalitas');


            Route::post('/about/store-visimisi', [AdminAboutController::class, 'storeVisiMisi'])
                ->name('about.storeVisiMisi');
            Route::get('/about/visi-misi/{id}/edit', [AdminAboutController::class, 'editVisiMisi'])->name('about.editVisiMisi');

            Route::resource('hasil-uji-lab', AdminUjiLabController::class);



            Route::resource('halaman_utama', AdminHalamanUtamaController::class);
            Route::resource('visi_misi', AdminVisiMisiController::class);
            Route::resource('services', AdminServiceController::class);
            Route::resource('footer', AdminFooterController::class)->only(['index', 'edit', 'update']);
            Route::resource('legalitas', AdminLegalitasController::class)->parameters([
                'legalitas' => 'legalitas',
            ]);
            // route::resource('team', AdminTeamController::class);
            route::resource('portfolio', AdminPortfolioController::class);
            route::resource('images', AdminImageController::class);

            /* PANDUAN & LANGGANAN */
            Route::resource('guides', AdminGuideController::class)->except('show');
            Route::resource('guides.lessons', AdminGuideLessonController::class)->except('show');
            Route::resource('guide-categories', AdminGuideCategoryController::class)
                ->except('show')->parameters(['guide-categories' => 'category']);
            Route::resource('subscription-plans', AdminSubscriptionPlanController::class)
                ->except('show')->parameters(['subscription-plans' => 'plan']);
            Route::get('subscriptions', [AdminSubscriptionController::class, 'index'])->name('subscriptions.index');
            Route::post('subscriptions/grant', [AdminSubscriptionController::class, 'grant'])->name('subscriptions.grant');
        });

        /* BLOG: super admin & blogger (blogger HANYA boleh membuka ini) */
        Route::middleware('role:super_admin,blogger')->group(function () {
            Route::resource('blogs', AdminBlogController::class);
        });

        /* VENDOR CRUD */
        Route::middleware('role:vendor')->group(function () {
            Route::resource('product_vendor', AdminProductVendorController::class);
        });
    });