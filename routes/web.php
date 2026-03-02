<?php

use App\Http\Controllers\Admin\GenerateBeritaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\LandingPageController::class.'@beranda')->name('beranda');
Route::get('/redaksi', App\Http\Controllers\LandingPageController::class.'@redaksi')->name('redaksi');
Route::get('/kode-etik', App\Http\Controllers\LandingPageController::class.'@kode')->name('kode-etik');
Route::get('/pedoman-media-siber', App\Http\Controllers\LandingPageController::class.'@pedoman')->name('pedoman-media-siber');
Route::get('/disclaimer', App\Http\Controllers\LandingPageController::class.'@disclaimer')->name('disclaimer');
Route::get('/category/{slug}', App\Http\Controllers\LandingPageController::class.'@category')->name('category');
Route::get('/tag/{tag}', App\Http\Controllers\LandingPageController::class.'@tag')->name('tag');
Route::get('/search', App\Http\Controllers\LandingPageController::class.'@search')->name('search');
Route::get('/detail/{slug}', App\Http\Controllers\LandingPageController::class.'@detail')->name('detail');

Route::get('/generate-berita', [GenerateBeritaController::class, 'generate'])->name('generate-berita');

Route::group(['prefix' => 'admin', 'middleware'=> ['role:admin'], 'as' => 'admin.'] , function() {
    Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class.'@index')->name('dashboard');
    Route::prefix('berita')->as('berita.')->group(function () {
        Route::resource('category', App\Http\Controllers\Admin\Berita\BeritaCategoryController::class)->only(['index', 'store', 'edit', 'destroy']);
        Route::resource('tag', App\Http\Controllers\Admin\Berita\BeritaTagController::class)->only(['index', 'store', 'edit', 'destroy']);
        Route::resource('berita', App\Http\Controllers\Admin\Berita\BeritaController::class)->only(['index', 'store', 'edit', 'destroy']);
    });

    Route::get('berita-tag/datatable', [App\Http\Controllers\Admin\Berita\BeritaTagController::class, 'datatable'])
    ->name('berita.tag.datatable');

    Route::get('berita-category/datatable', [App\Http\Controllers\Admin\Berita\BeritaCategoryController::class, 'datatable'])
    ->name('berita.category.datatable');

    Route::get('berita/datatable', [App\Http\Controllers\Admin\Berita\BeritaController::class, 'datatable'])
    ->name('berita.berita.datatable');

    Route::resource('user',App\Http\Controllers\Admin\UserController::class)->only(['index','store','edit','destroy']);
    Route::get('setting', App\Http\Controllers\Admin\SettingController::class . '@index')->name('setting.index');
    Route::post('setting/general', App\Http\Controllers\Admin\SettingController::class . '@general')->name('setting.general');
    Route::post('setting/contact', App\Http\Controllers\Admin\SettingController::class . '@contact')->name('setting.contact');
    Route::post('setting/sosmed', App\Http\Controllers\Admin\SettingController::class . '@sosmed')->name('setting.sosmed');
    Route::post('setting/redaksi', App\Http\Controllers\Admin\SettingController::class . '@redaksi')->name('setting.redaksi');
    Route::post('setting/kode', App\Http\Controllers\Admin\SettingController::class . '@kode')->name('setting.kode');
    Route::post('setting/pedoman', App\Http\Controllers\Admin\SettingController::class . '@pedoman')->name('setting.pedoman');
    Route::post('setting/disclaimer', App\Http\Controllers\Admin\SettingController::class . '@disclaimer')->name('setting.disclaimer');
    Route::post('setting/google-ads', App\Http\Controllers\Admin\SettingController::class . '@googleAds')->name('setting.google-ads');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/profile', App\Http\Controllers\ProfileController::class . '@edit')->name('profile.edit');
    Route::patch('/profile', App\Http\Controllers\ProfileController::class . '@update')->name('profile.update');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'proses'])->name('login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

