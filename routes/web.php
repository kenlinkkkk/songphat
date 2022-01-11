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

Auth::routes();


Route::prefix('/')->name('home.')->group(function () {
    Route::get('/', 'Home\HomeController@index')->name('index');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/', 'UserController@index')->name('profile');
        Route::post('/change-password',  'UserController@changePassword')->name('changePassword');

        Route::prefix('/product')->name('product.')->group(function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('/add', 'ProductController@add')->name('add');
            Route::get('/edit/{id}', 'ProductController@edit')->name('edit');

            Route::post('/create', 'ProductController@create')->name('create');
            Route::post('/update/{id}', 'ProductController@update')->name('update');
            Route::post('/delete/{id}', 'ProductController@destroy')->name('destroy');
        });

        Route::prefix('/post')->name('post.')->group(function () {
            Route::get('/', 'PostController@index')->name('index');
            Route::get('/add', 'PostController@add')->name('add');
            Route::get('/edit/{id}', 'PostController@edit')->name('edit');

            Route::post('/create', 'PostController@create')->name('create');
            Route::post('/update/{id}', 'PostController@update')->name('update');
            Route::post('/delete/{id}', 'PostController@destroy')->name('destroy');
        });

        Route::prefix('/recruitment')->name('recruitment.')->group(function () {
            Route::get('/', 'RecruitmentController@index')->name('index');
            Route::get('/add', 'RecruitmentController@add')->name('add');
            Route::get('/edit/{id}', 'RecruitmentController@edit')->name('edit');

            Route::post('/create', 'RecruitmentController@create')->name('create');
            Route::post('/update/{id}', 'RecruitmentController@update')->name('update');
            Route::post('/delete/{id}', 'RecruitmentController@destroy')->name('destroy');
        });
        Route::middleware(['role:Admin|SuperAdmin'])->group(function () {
            Route::prefix('/position')->name('position.')->group(function () {
                Route::get('/', 'RecruitmentPositionController@index')->name('index');
                Route::get('/add', 'RecruitmentPositionController@add')->name('add');
                Route::get('/edit/{id}', 'RecruitmentPositionController@edit')->name('edit');

                Route::post('/create', 'RecruitmentPositionController@create')->name('create');
                Route::post('/update/{id}', 'RecruitmentPositionController@update')->name('update');
                Route::post('/delete/{id}', 'RecruitmentPositionController@destroy')->name('destroy');
            });
        });

        Route::middleware(['role:SuperAdmin'])->group(function () {
            Route::prefix('/user')->name('user.')->group(function () {
                Route::get('/', 'UserController@userList')->name('index');
                Route::get('/add', 'UserController@add')->name('add');
                Route::get('/edit/{id}', 'UserController@edit')->name('edit');

                Route::post('/create', 'UserController@create')->name('create');
                Route::post('/update/{id}', 'UserController@update')->name('update');
                Route::post('/delete/{id}', 'UserController@destroy')->name('destroy');
            });
        });
    });
});
