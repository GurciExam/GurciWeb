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
//     return view('welcome');
// });

//Index
Route::get('/','homeController@index')->name('index');

// sidenav =================================================================
    //dashboard
    Route::get('/dashboard','homeController@dashboard')->name('dashboard');
    

// FormLogin ==============================================================
    Route::post('/login','authController@login')->name('login');
    

// session ==============================================================
    Route::group(['middleware' => 'ceksession'], function()
    {
        //files
        Route::get('/files','homeController@files')->name('files');
        //message
        Route::get('/message','homeController@message')->name('message');
        //penilaian
        Route::get('/penilaian','homeController@penilaian')->name('penilaian');
        //bookmark
        Route::get('/bookmark','homeController@bookmark')->name('bookmark');
        //users
        Route::get('/users','homeController@users')->name('users');
        //logout
        Route::get('/logout','authController@logout')->name('logout');
    });
