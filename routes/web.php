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

// Route::get('/', function () {
// 	$post = App\Models\Post::orderBy('created_at', 'desc')->first();
//     return view('welcome')->withPost($post);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/posts', 'App\Http\Controllers\PostsController')->middleware('auth');

Route::resource('/categories', 'App\Http\Controllers\CategoriesController');

Route::get('/', 'App\Http\Controllers\BlogController@index');

Route::resource('/users', 'App\Http\Controllers\UserController')->middleware('auth');

Route::get('{slug}', [
	'as' => 'blog.single',
	'uses' => 'App\Http\Controllers\BlogController@getSingle'
])->where(
	'slug', '[\w\d\-\_]+'
);

Route::get('{image_slug}', [
	'as' => 'blog.image',
	'uses' => 'BlogController@getImage'
])->where(
	'image_slug', '[\w\d\-\_]+'
);

Route::get('add_to_cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'products.addToCart'
]);

Route::get('shoppingcart', [
	'uses' => 'ProductController@getCart',
	'as' => 'products.shoppingcart'
]);

Route::get('catalog', [
	'uses' => 'BlogController@getSingle',
	'as' => 'blog.catalog'
]);

Route::get('/terms/voucher', [
	'uses' => 'BlogController@getTerms',
	'as' => 'blog.voucher'
]);

Route::resource('/products', 'ProductController', ['except' => ['create', 'delete', 'update']]);

