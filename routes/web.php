<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\managementControllers\ManagementAuthController;
use App\Http\Controllers\managementControllers\MagamentController;
use App\Http\Controllers\managementControllers\CategoroyController;
use App\Http\Controllers\managementControllers\ProductController;
use App\Http\Controllers\managementControllers\OrderController;
use App\Http\Controllers\managementControllers\BlogManagement;
use App\Http\Controllers\managementControllers\CouponController;


use App\Http\Controllers\websiteController\HomeController;
use App\Http\Controllers\websiteController\UserController;
use App\Http\Controllers\websiteController\ShopController;
use App\Http\Controllers\websiteController\CartAndCheckoutController;
use App\Http\Controllers\websiteController\BlogController;
use App\Http\Controllers\websiteController\ContactController;



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

        Route::get('blog-category', [BlogManagement::class, 'blogCategory'])->name('management.blog-category');
        Route::post('add-blog-category', [BlogManagement::class, 'addBlogCategory'])->name('management.add-blog-category');
        Route::post('update-blog-category', [BlogManagement::class, 'updateBlogCategory'])->name('management.update-blog-category');
        Route::get('delete-blog-category/{cat_id}', [BlogManagement::class, 'deleteBlogCategory'])->name('management.delete-blog-category');


        Route::get('coupon', [CouponController::class, 'coupon'])->name('management.coupon');
        Route::post('add-coupon', [CouponController::class, 'addCoupon'])->name('management.add-coupon');
        Route::post('update-coupon', [CouponController::class, 'updateCoupon'])->name('management.update-coupon');
        Route::get('delete-coupon/{id}', [CouponController::class, 'deleteCoupon'])->name('management.delete-coupon');

        Route::get('banner', [MagamentController::class, 'banner'])->name('management.banner');
        Route::post('add-banner', [MagamentController::class, 'addBanner'])->name('management.add-banner');
        Route::post('update-banner', [MagamentController::class, 'updateBanner'])->name('management.update-banner');
        Route::get('delete-banner/{id}', [MagamentController::class, 'deleteBanner'])->name('management.delete-banner');


        Route::get('blog-management', [BlogManagement::class, 'blogManagement'])->name('management.blog-management');
        Route::post('add-blog', [BlogManagement::class, 'addBlog'])->name('management.add-blog');
        Route::post('update-blog', [BlogManagement::class, 'updateBlog'])->name('management.update-blog');
        Route::get('delete-blog/{b_id}', [BlogManagement::class, 'deleteBlog'])->name('management.delete-blog');

        Route::get('logout', [MagamentController::class, 'managementLogout'])->name('management.logout');
        
        Route::get('add-management', [MagamentController::class, 'showManagement'])->name('management.add-management');
        Route::post('add-management', [MagamentController::class, 'addManagement'])->name('management.add-management');
        Route::post('edit-management', [MagamentController::class, 'editManagement'])->name('management.edit-management');
        Route::get('delete-management/{id}', [MagamentController::class, 'deleteManagement'])->name('management.delete-management');
        Route::get('search-staff-management', [MagamentController::class, 'searchStaffManagement'])->name('management.search-staff-management');


        Route::get('order-management', [OrderController::class, 'orderManagement'])->name('management.order-management');
        Route::get('order-details', [OrderController::class, 'orderDetails'])->name('management.order-details');

    });
});

///////////start Website /////////////////


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('getProductsByCategory', [HomeController::class, 'getProductsByCategory'])->name('getProductsByCategory');
Route::get('get-favorite-product', [HomeController::class, 'getFavoriteProduct'])->name('get-favorite-product');


Route::post('/add-to-cart/{productId}', [CartAndCheckoutController::class, 'addToCart'])->name('add-to-cart');
Route::get('/shoping-card', [CartAndCheckoutController::class, 'shopingCard'])->name('shoping-card');
Route::post('/update-cart', [CartAndCheckoutController::class, 'updateCart'])->name('update-cart');
Route::post('/remove-from-cart', [CartAndCheckoutController::class, 'removeFromCart'])->name('remove-from-cart');
Route::get('checkout', [CartAndCheckoutController::class, 'checkout'])->name('checkout');
Route::post('post-checkout', [CartAndCheckoutController::class, 'postCheckout'])->name('post-checkout');
Route::get('apply-coupon', [CartAndCheckoutController::class, 'applycoupon'])->name('apply-coupon');
Route::get('add-favorite/{p_id}', [CartAndCheckoutController::class, 'addFavorite'])->name('add-favorite');



Route::get('user-login', [UserController::class, 'userLogin'])->name('user-login');
Route::get('user-register', [UserController::class, 'userRegister'])->name('user-register');
Route::post('login-post', [UserController::class, 'loginPost'])->name('login-post');
Route::post('register-post', [UserController::class, 'registerPost'])->name('register-post');

Route::get('shop-grid', [ShopController::class, 'shopGrid'])->name('shop-grid');
Route::get('/shop-details', [ShopController::class, 'shopDetails'])->name('shop-details');

Route::get('blog', [BlogController::class, 'blog'])->name('blog');
Route::get('blog-details', [BlogController::class, 'blogDetails'])->name('blog-details');

Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('send-contact', [ContactController::class, 'sendContact'])->name('send-contact');
Route::post('newsletter/subscribe', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');

Route::post('/verify-payment', [CartAndCheckoutController::class, 'verifyPayment'])->name('verify.payment');



