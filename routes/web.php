<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blogsingle', function () {
    return view('blogsingle');
});

Route::get('/storelisting', function () {
    return view('storelisting');
});

Auth::routes(['verify' => true]);


//Stripe payment
Route::get('/stripe', 'StripeController@handleGet');
Route::post('/stripe', 'StripeController@handlePost')->name('stripe.payment');


//Admin
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('contacts', 'ContactController');
    Route::resource('configurations', 'ConfigurationController');
    Route::resource('stores', 'StoreController');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');

    //Place order
    Route::post('/placeorder', ['uses' =>'FrontStoreController@placeOrder'])->name('placeorder');

});

//Front Store Controller
Route::get('{controller_name}', ['uses' =>'FrontStoreController@index']);
Route::post('/search', ['uses' =>'FrontSearchController@search'])->name('search');

