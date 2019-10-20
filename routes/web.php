<?php

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


use App\Support\Storage\Contracts\StorageInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;



//Route::group(['middleware'=>'admin'] , function () {
//
//});
Route::prefix('api')->group(function (){
    Route::get('categories' , 'Backend\CategoryController@apiIndex')->name('api.categories');
    Route::post('categories/attribute' , 'Backend\CategoryController@apiIndexAttribute')->name('api.categories.attribute');
    Route::get('/cities/{provinceId}', 'Auth\RegisterController@getAllCities');
    Route::get('/products/{id}', 'Frontend\ProductController@apiGetProduct');
    Route::get('/sort-products/{id}/{sort}/{paginate}', 'Frontend\ProductController@apiGetSortedProduct');
});
// backend middleware
//Route::group(['middleware'=>'admin'], function() {
//    Route::prefix('administrator')->group(function (){
//        Route::get('/' , 'Backend\MainController@mainPage')->name('administrator');
//        Route::resource('categories' , 'Backend\CategoryController');
//        Route::resource('users' , 'Backend\UserController');
//        Route::get('/categories/{id}/settings', 'Backend\CategoryController@indexSetting')->name('categories.indexSetting');
//        Route::post('/categories/{id}/settings', 'Backend\CategoryController@saveSetting')->name('categories.saveSetting');
//        Route::resource('attributes-group' , 'Backend\AttributeGroupController');
//        Route::resource('attributes-value' , 'Backend\AttributeValueController');
//        Route::resource('brands' , 'Backend\BrandCntroller');
//        Route::resource('banners' , 'Backend\BannerController');
//        Route::resource('slides' , 'Backend\SlideController');
//        Route::resource('photos' , 'Backend\PhotoController');
//        Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
//        Route::resource('products' , 'Backend\ProductController');
//        Route::resource('coupons', 'Backend\CouponController');
//    });
//});
Route::prefix('adminam')->group(function (){
    Route::get('/login' , 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login' , 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/login' , 'Auth\AdminLoginController@login')->name('admin.login.submit');
    //Password Reset Routes
    Route::post('/password/email' , 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset' , 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset' , 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}' , 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::group(['middleware'=>'auth:admin'], function() {
    Route::prefix('administrator')->group(function (){
        Route::get('/' , 'Backend\MainController@mainPage')->name('administrator');
        Route::resource('categories' , 'Backend\CategoryController');
        Route::resource('users' , 'Backend\UserController');
        Route::get('/categories/{id}/settings', 'Backend\CategoryController@indexSetting')->name('categories.indexSetting');
        Route::post('/categories/{id}/settings', 'Backend\CategoryController@saveSetting')->name('categories.saveSetting');
        Route::resource('attributes-group' , 'Backend\AttributeGroupController');
        Route::resource('attributes-value' , 'Backend\AttributeValueController');
        Route::resource('brands' , 'Backend\BrandCntroller');
        Route::resource('banners' , 'Backend\BannerController');
        Route::resource('slides' , 'Backend\SlideController');
        Route::resource('photos' , 'Backend\PhotoController');
        Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
        Route::resource('products' , 'Backend\ProductController');
        Route::resource('coupons', 'Backend\CouponController');
        Route::get('/orders', 'Backend\OrderController@index')->name('orders.index');
        Route::get('/orders/list/{id}', 'Backend\OrderController@getOrderLists')->name('orders.list');
    });
});


// frontend middleware
Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile', 'Frontend\UserController@profile')->name('user.profile');
    Route::get('/profile/address', 'Frontend\UserController@getAddress')->name('user.profile.address');
    Route::post('/profile/address/update/{id}', 'Frontend\UserController@updateAddress')->name('user.update.address');
    Route::get('/profile/orders/list', 'Frontend\OrderController@getOrders')->name('user.profile.orders');
    Route::get('/profile/orders/{id}', 'Frontend\OrderController@getOrdersList')->name('user.profile.orders.list');
    Route::post('/coupon', 'Frontend\CouponController@addCoupon')->name('coupon.add');
//    Route::get('/payment-verify', 'Frontend\OrderController@verify')->name('payment.verify');
});
Route::post('/payment/{gateway}/callback', 'Frontend\PaymentController@verify')->name('payment.verify');


Route::get('/', 'Frontend\HomeController@index')->name('home');


// user login route start
Route::post('/register-user', 'Frontend\UserController@register')->name('user.register');
Route::post('login-user' , 'Frontend\HomeController@authenticateUser')->name('user.login');
// user login route end



//Route::get('/add-to-cart/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::get('/basket/add/{product}' , 'Frontend\BasketController@add')->name('basket.add');
Route::get('/basket', 'Frontend\BasketController@index')->name('basket.index');
Route::post('/basket/update/{product}', 'Frontend\BasketController@update')->name('basket.update');
Route::get('/basket/{product}/product-remove', 'Frontend\BasketController@removeItem')->name('basket.remove.product');
Route::get('/basket/checkout', 'Frontend\BasketController@checkoutForm')->name('basket.checkout.form');
Route::post('basket/checkout', 'Frontend\BasketController@checkout')->name('basket.checkout');
Route::get('/basket/clear' , function () {
    resolve(StorageInterface::class)->clear();
});
//Route::post('/remove-item/{id}', 'Frontend\CartController@removeItem')->name('cart.remove');
//Route::get('/cart', 'Frontend\CartController@getCart')->name('cart.cart');
Route::get('/products/{slug}', 'Frontend\ProductController@getProduct')->name('product.single');
Route::get('/category/{slug}/', 'Frontend\ProductController@getProductByCategory')->name('category.index');
Route::get('/search', 'Frontend\SearchController@search')->name('search');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

