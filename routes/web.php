<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function (){
    return view('welcome');
});

Route::get('/users/match', 'PicturesController@userPictures');

Auth::routes();

Route::post('affection/{user}/{type}', 'MatchController@affection');

Route::get('/pictures/create', 'PicturesController@create');
Route::post('/pictures', 'PicturesController@store');
Route::get('/pictures/{post}', 'PicturesController@show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profiles/show', 'ProfilesController@show')->name('profiles.show');
