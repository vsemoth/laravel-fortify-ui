<?php

use App\Mail\OrderPlaced;

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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
	//        // Uses Auth Middleware
	//    });
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

$host = request()->getHttpHost();

if($host ==  'ski.co.za' || $host == 'www.ski.co.za' || '127.0.0.1') {
	Route::get('/', 'BlogController@index')->middleware('web');
} elseif($host == 'www.kidsfunparties.co.za') {
	return "kids parties";
}

Route::get('/mailable', function ()
{
	$orders = App\Order::orderBy('created_at', 'desc')->first()->get();
        $orders->transform(function ($order, $key)
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });

	return new OrderPlaced($orders);
});

//Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
/*
$host = request()->getHttpHost();

if($host ==  'kidsfunparties.co.za' || $host == 'www.kidsfunparties.co.za') {
	Route::get('/', 'BlogController@kids')->middleware('web');
}

Route::get('/', 'BlogController@index')->middleware('web');
*/

Route::post('send', 'MailController@send');

Auth::routes();

Route::resource('profile', 'ProfileController')->middleware('auth');

Route::get('ski_mail_data', function ()
{
	return view('ski_mail_data');
});

Route::get('checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
]);

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::post('checkout', [
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
]);

Route::get('shippinginfo', 'CheckoutController@shipping')->name('checkout.shipping');

Route::resource('details', 'DetailsController');

Route::get('manage', function(){
    return view('manage.dashboard');
});

	if($host ==  'ski.co.za' || $host == 'www.ski.co.za' || '127.0.0.1') {

Route::get('{slug}', [
	'as' => 'blog.single',
	'uses' => 'BlogController@getSingle'
])->where(
	'slug', '[\w\d\-\_]+'
);

	} else {

		Route::get('{blog_slug}', [
			'as' => 'blog.parties',
			'uses' => 'BlogController@getKidsparties'
		])->where(
			'blog_slug', '[\w\d\-\_]+'
		);

	}

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
	
Route::prefix('manage', ['middleware' => ['auth']])->group(function ()
{
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/notifications', 'NotificationController');
	Route::resource('/posts', 'PostsController');
	Route::resource('/products', 'ProductController');
	Route::resource('/productimages', 'ProductimageController');
	Route::resource('/screenshots', 'ScreenshotController');
	Route::resource('/categories', 'CategoriesController', ['except' => ['create']]);
});

Route::prefix('admin', ['middleware' => ['auth']])->group(function ()
{
	Route::get('/', 'AdminController@index');
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/notifications', 'NotificationController');
	Route::resource('/kidsparties', 'KidspartiesController');
	Route::resource('/screenshots', 'ScreenshotController');
	Route::resource('/categories', 'CategoryController', ['except' => ['create']]);
});