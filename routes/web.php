<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\managementControllers\ManagementAuthController;
use App\Http\Controllers\managementControllers\MagamentController;
use App\Http\Controllers\managementControllers\CategoroyController;



Route::get('/', function () {
    return view('website.index');
})->name('home');


Route::get('/blog', function () {
    return view('website.blog');
})->name('blog');


Route::get('/blog-details', function () {
    return view('website.blog-details');
})->name('blog-details');


Route::get('/checkout', function () {
    return view('website.checkout');
})->name('checkout');


Route::get('/contact', function () {
    return view('website.contact');
})->name('contact');


Route::get('/shop-details', function () {
    return view('website.shop-details');
})->name('shop-details');

Route::get('/shop-grid', function () {
    return view('website.shop-grid');
})->name('shop-grid');

Route::get('/shoping-card', function () {
    return view('website.shoping-cart');
})->name('shoping-card');




///////////start management /////////////////

Route::get('management/login', [ManagementAuthController::class, 'managementLogin'])->name('management.login');
Route::post('management/loginPost', [ManagementAuthController::class, 'managementLoginPost'])->name('management.loginPost');
Route::get('error404', [ManagementAuthController::class, 'error404'])->name('error404');

Route::prefix('/management')->group(function() {

    Route::group([], function() {

        Route::get('dashboard', [MagamentController::class, 'dashboard'])->name('management.dashboard');
        Route::get('dashboard-filter', [MagamentController::class, 'dashboardFilter'])->name('management.dashboard-filter');
        
        Route::get('admin-profile', [MagamentController::class, 'showProfile'])->name('management.admin-profile');
        Route::post('admin-profile', [MagamentController::class, 'updateProfile'])->name('management.admin-profile');

        Route::get('change-password', [MagamentController::class, 'showChangePassword'])->name('management.change-password');
        Route::post('change-password', [MagamentController::class, 'changePassword'])->name('management.change-password');



        Route::get('category-management', [CategoroyController::class, 'categoryManagement'])->name('management.category-management');


        Route::get('logout', [MagamentController::class, 'managementLogout'])->name('management.logout');
        
     
        Route::get('add-management', [MagamentController::class, 'showManagement'])->name('management.add-management');
        Route::post('add-management', [MagamentController::class, 'addManagement'])->name('management.add-management');
        Route::post('edit-management', [MagamentController::class, 'editManagement'])->name('management.edit-management');
        Route::get('delete-management/{id}', [MagamentController::class, 'deleteManagement'])->name('management.delete-management');
        Route::get('search-staff-management', [MagamentController::class, 'searchStaffManagement'])->name('management.search-staff-management');

       

    });
});


