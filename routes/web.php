<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\managementControllers\ManagementAuthController;
use App\Http\Controllers\managementControllers\MagamentController;
use App\Http\Controllers\managementControllers\CategoroyController;
use App\Http\Controllers\managementControllers\ProductController;

use App\Http\Controllers\websiteController\HomeController;

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
        Route::post('add-category', [CategoroyController::class, 'addCategory'])->name('management.add-category');
        Route::post('update-category', [CategoroyController::class, 'updateCategory'])->name('management.update-category');
        Route::get('delete-category/{cat_id}', [CategoroyController::class, 'deleteCategory'])->name('management.delete-category');


        Route::get('product-management', [ProductController::class, 'productManagement'])->name('management.product-management');
        Route::post('add-product', [ProductController::class, 'addProduct'])->name('management.add-product');
        Route::post('update-product', [ProductController::class, 'updateProduct'])->name('management.update-product');
        Route::get('delete-product/{p_id}', [ProductController::class, 'deleteProduct'])->name('management.delete-product');




        Route::get('logout', [MagamentController::class, 'managementLogout'])->name('management.logout');
        
     
        Route::get('add-management', [MagamentController::class, 'showManagement'])->name('management.add-management');
        Route::post('add-management', [MagamentController::class, 'addManagement'])->name('management.add-management');
        Route::post('edit-management', [MagamentController::class, 'editManagement'])->name('management.edit-management');
        Route::get('delete-management/{id}', [MagamentController::class, 'deleteManagement'])->name('management.delete-management');
        Route::get('search-staff-management', [MagamentController::class, 'searchStaffManagement'])->name('management.search-staff-management');

       

    });
});



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop-details', [HomeController::class, 'shopDetails'])->name('shop-details');

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


Route::get('/shop-grid', function () {
    return view('website.shop-grid');
})->name('shop-grid');

Route::get('/shoping-card', function () {
    return view('website.shoping-cart');
})->name('shoping-card');



