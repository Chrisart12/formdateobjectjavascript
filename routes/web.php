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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/social-login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social-login.redirect');
// Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social-login.callback');
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login/github/redirect');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback')->name('login/github/callback');

// Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google.redirect');
// Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('login.google.callback');

// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook.redirect');
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('login.facebook.callback');



Route::prefix('chris')->name('chris.')->middleware('auth')->group(function () {

    Route::resources([
        'posts' => 'PostController',
        'photos'=> 'PhotoController',
        'comments'=> 'CommentController'
    ]);

});

