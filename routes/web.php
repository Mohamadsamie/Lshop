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


use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware'=>'admin'], function() {
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
    });
});


// frontend middleware
Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile', 'Frontend\UserController@profile')->name('user.profile');
    Route::post('/coupon', 'Frontend\CouponController@addCoupon')->name('coupon.add');
});

Route::resource('/', 'Frontend\HomeController');
//Route::resource('/category', 'Frontend\MenuController');
// user login route start
Route::post('/register-user', 'Frontend\UserController@register')->name('user.register');
Route::post('login-user' , 'Frontend\HomeController@authenticateUser')->name('user.login');
// user login route end
Route::get('/add-to-cart/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::post('/remove-item/{id}', 'Frontend\CartController@removeItem')->name('cart.remove');
Route::get('/cart', 'Frontend\CartController@getCart')->name('cart.cart');
Route::get('/products/{slug}', 'Frontend\ProductController@getProduct')->name('product.single');
Route::get('/category/{slug}/', 'Frontend\ProductController@getProductByCategory')->name('category.index');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

