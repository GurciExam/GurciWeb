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

    Route::post('/signUp','authController@signUp')->name('signUp');

// cookie
    Route::get('/cookie/set','cookieController@setCookie');
    Route::get('/cookie/get','cookieController@getCookie');
    

// session ==============================================================
    Route::group(['middleware' => 'ceksession'], function()
    {
        //files
        Route::get('/files','homeController@files')->name('files');
        //penilaian
            Route::get('/penilaian','homeController@penilaian')->name('penilaian');

            // TambahKelas
                Route::get('/tambahKelas','penilaianController@tambahKelas')->name('tambahKelas');

            // Buka detail Kelas
                Route::get('/bukaDetailKelas','penilaianController@bukaDetailKelas')->name('bukaDetailKelas');

            // Form Input Soal Soal ujian
                Route::get('/formSoal','formSoalController@formSoal')->name('formSoal');
            
            // Store Soal Soal ujian
                Route::get('/formSoal/store','formSoalController@storeSoal')->name('storeSoal');

        //about
        Route::get('/about','homeController@about')->name('about');
        //message
        Route::get('/message','homeController@message')->name('message');
        //bookmark
        Route::get('/bookmark','homeController@bookmark')->name('bookmark');
        //users
        Route::get('/users','homeController@users')->name('users');
        //logout
        Route::get('/logout','authController@logout')->name('logout');
    });
