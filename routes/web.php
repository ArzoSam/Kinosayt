<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function() {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
   Route::group(['namespace' => 'Main'], function (){
       Route::get('/', 'IndexController')->name('admin.main.index');
   });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function (){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');

    });

   Route::group(['namespace' => 'Movie', 'prefix' => 'movies'], function (){
        Route::get('/', 'IndexController')->name('admin.movie.index');
        Route::get('/create', 'CreateController')->name('admin.movie.create');
        Route::post('/', 'StoreController')->name('admin.movie.store');
        Route::get('/{movie}', 'ShowController')->name('admin.movie.show');
        Route::get('/{movie}/edit', 'EditController')->name('admin.movie.edit');
        Route::patch('/{movie}', 'UpdateController')->name('admin.movie.update');
        Route::delete('/{movie}', 'DeleteController')->name('admin.movie.delete');
   });
   Route::group(['namespace' => 'Director', 'prefix' => 'directors'], function (){
       Route::get('/', 'IndexController')->name('admin.director.index');
       Route::get('/create', 'CreateController')->name('admin.director.create');
       Route::post('/', 'StoreController')->name('admin.director.store');
       Route::get('/{director}', 'ShowController')->name('admin.director.show');
       Route::get('/{director}/edit', 'EditController')->name('admin.director.edit');
       Route::patch('/{director}', 'UpdateController')->name('admin.director.update');
       Route::delete('/{director}', 'DeleteController')->name('admin.director.delete');

   });
   Route::group(['namespace' => 'Genre', 'prefix' => 'genres'], function(){
       Route::get('/', 'IndexController')->name('admin.genre.index');
       Route::get('/create', 'CreateController')->name('admin.genre.create');
       Route::post('/', 'StoreController')->name('admin.genre.store');
       Route::get('/{genre}', 'ShowController')->name('admin.genre.show');
       Route::get('/{genre}/edit', 'EditController')->name('admin.genre.edit');
       Route::patch('/{genre}', 'UpdateController')->name('admin.genre.update');
       Route::delete('/{genre}', 'DeleteController')->name('admin.genre.delete');
   });
    Route::group(['namespace' => 'Actor', 'prefix' => 'actor'], function(){
        Route::get('/', 'IndexController')->name('admin.actor.index');
        Route::get('/create', 'CreateController')->name('admin.actor.create');
        Route::post('/', 'StoreController')->name('admin.actor.store');
        Route::get('/{actor}', 'ShowController')->name('admin.actor.show');
        Route::get('/{actor}/edit', 'EditController')->name('admin.actor.edit');
        Route::patch('/{actor}', 'UpdateController')->name('admin.actor.update');
        Route::delete('/{actor}', 'DeleteController')->name('admin.actor.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Movie', 'prefix' => 'movies'], function (){
    Route::get('/', 'IndexController')->name('movie.index');
    Route::get('/{movie}', 'ShowController')->name('movie.show');
    Route::group(['namespace' => 'Comment', 'prefix' => '{movie}/comments'], function () {
        Route::post('/', 'StoreController')->name('movie.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{movie}/likes'], function () {
        Route::post('/', 'StoreController')->name('movie.like.store');
    });
    Route::group(['namespace' => 'Actor', 'prefix' => 'actors'], function (){
        Route::get('/{actor}', 'ShowController')->name('actor.show');
    });
    Route::group(['namespace' => 'Director', 'prefix' => 'directors'], function (){
        Route::get('/{director}', 'ShowController')->name('director.show');
    });
});





Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function() {
    Route::group(['namespace' => 'Main' , 'prefix' => 'main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'likeds'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
});

Route::get('/search',  [\App\Http\Controllers\Movie\SearchController::class, 'search'])->name('search.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

