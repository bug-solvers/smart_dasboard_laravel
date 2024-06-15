<?php

use App\Http\Controllers\Apps\CouponController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\SEOMainController;
use App\Http\Controllers\Apps\SettingController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
    });



    Route::prefix('coupon')->name('coupon.')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('/create', [CouponController::class, 'create'])->name('create');
        Route::post('/store', [CouponController::class, 'store'])->name('store');
        Route::get('/destroy/{coupon}', [CouponController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{coupon}', [CouponController::class, 'edit'])->name('edit');
        Route::put('/update/{coupon}', [CouponController::class, 'update'])->name('update');
    });

    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/create', [SettingController::class, 'create'])->name('create');
        Route::get('/destroy/{setting}', [SettingController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('edit');
    });

    Route::prefix('seo_main')->name('seo.main.')->group(function () {
        Route::get('/', [SEOMainController::class, 'index'])->name('index');
        Route::get('/create', [SEOMainController::class, 'create'])->name('create');
        Route::post('/create', [SEOMainController::class, 'store'])->name('store');
        Route::get('/destroy/{setting}', [SEOMainController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{setting}', [SEOMainController::class, 'edit'])->name('edit');
    });

});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
