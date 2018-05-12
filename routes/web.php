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
	
use App\Product;


Route::get('/', function () {

    return view('welcome');
});
//Filter Route




// checking Routes

Route::get('users', 'UsersController@index');

Route::get('check', 'CategoryController@check');

Route::get('slider', 'UsersController@slider');

// Products Routes

//Route::get('/products','ProductController@index');

Route::get('/products', 'TestController@filter');

Route::post('/products','ProductController@save');

Route::get('/products/create','ProductController@create');

Route::get('/products/show/{product}','ProductController@show');

Route::get('/products/{id}/edit','ProductController@edit');

Route::post('/products/update','ProductController@update');

Route::get('products/{id}/delete' , 'ProductController@delete');

Route::post('/products/show/{product}','CommentController@store');


// Categories Routes

Route::get('/categories','CategoryController@index');

Route::post('/categories','CategoryController@save');

Route::get('/categories/create','CategoryController@create');

Route::get('/categories/show/{product}','CategoryController@show');

Route::get('/categories/{id}/edit','CategoryController@edit');

Route::post('/categories/update','CategoryController@update');

Route::get('/categories/{id}/delete' , 'CategoryController@delete');



//Sub Categories Routes

Route::get('/subcats','TestController@subcatfilter');

Route::post('/subcats','SubcatController@save');

Route::get('/subcats/create','SubcatController@create');

Route::get('/subcats/show/{product}','SubcatController@show');

Route::get('/subcat/{id}/edit','SubcatController@edit');

Route::post('/subcats/update','SubcatController@update');

Route::get('/subcats/{id}/delete' , 'SubcatController@delete');

Route::resource('/review','SubcatReviewController');


// Ratings Routes

Route::get('/posts', 'HomeController@posts')->name('posts');

Route::post('/posts', 'HomeController@postPost')->name('posts.post');

Route::get('posts/{id}', 'HomeController@show')->name('posts.show');


// Email Verification

Route::get('verify/{email}/{token}' , 'Auth\RegisterController@verifyemail');

//User Profile

Route::get('/profile','UsersController@profile');

Route::post('/profile' ,'UsersController@update');

Route::get('/profile/{id}' ,'UsersController@show');

//Auth:make

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Socialite Routes

//Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github');

//Route::get('/login/{social}/{callback}', 'Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github');

Route::get('/login/facebook' , 'Auth\LoginController@redirectToFacebook');

Route::get('/login/facebook/callback' , 'Auth\LoginController@handleFacebookCallback');

Route::get('/login/twitter' , 'Auth\LoginController@redirectToTwitter');

Route::get('/login/twitter/callback' , 'Auth\LoginController@handleTwitterCallback');

Route::get('/login/google' , 'Auth\LoginController@redirectToGoogle');

Route::get('/login/google/callback' , 'Auth\LoginController@handleGoogleCallback');

Route::get('/login/linkedin' , 'Auth\LoginController@redirectToLinkedIn');

Route::get('/login/linkedin/callback' , 'Auth\LoginController@handleLinkedInCallback');

Route::get('/login/github' , 'Auth\LoginController@redirectToGithub');

Route::get('/login/github/callback' , 'Auth\LoginController@handleGithubCallback');

// Routes for ajax 

Route::get('/subcats/create' , 'SubcatController@prodfunct');

Route::get('/findProductName' , 'SubcatController@findProductName');

Route::get('/findSubcatName' , 'SubcatController@findSubcatName');

Route::get('/findPrice' , 'SubcatController@findPrice');


//Search Routes

//Route::post('/search', 'SearchController@filter');

Route::get('search' , 'SearchController@index');

//Route::get('search' , 'ProductController@search');


Route::get('/prodview' , 'TestController@prodfunct');

Route::get('/findProductName' , 'TestController@findProductName');

Route::get('/findSubcatName' , 'TestController@findSubcatName');

Route::get('/findPrice' , 'TestController@findPrice');



