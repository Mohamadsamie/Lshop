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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['middleware'=>'admin'] , function () {
//
//});

Route::prefix('administrator')->group(function (){
    Route::get('/' , 'Backend\MainController@mainPage');
    Route::resource('categories' , 'Backend\CategoryController');
    Route::resource('attributes-group' , 'Backend\AttributeGroupController');
    Route::resource('attributes-value' , 'Backend\AttributeValueController');
    Route::resource('brands' , 'Backend\BrandCntroller');
    Route::resource('photos' , 'Backend\PhotoController');
    Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
    Route::resource('products' , 'Backend\ProductController');


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
