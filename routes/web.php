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
            // SISWA
                // TambahSiswa
                    // Excel
                    Route::post('siswa/tambah/Excel','siswaController@importSiswaExcel')->name('importSiswaExcel');
                    
                    // Satuan
                    Route::post('siswa/tambah/Satuan','siswaController@tambahSiswaSatuan')->name('importSiswaSatuan');

                // DetailSiswa
                Route::get('siswa/detail','siswaController@detailSiswa')->name('detailSiswa');

                // UbahSiswa
                Route::put('siswa/ubah','siswaController@ubahSiswa')->name('ubahSiswa');

                // HapusSiswa
                Route::post('siswa/hapus','siswaController@hapusSiswa')->name('hapusSiswa');

            // KELAS
                // TambahKelas
                    Route::get('/kelas/tambah','penilaianController@tambahKelas')->name('tambahKelas');

                // UbahKelas
                    Route::put('/kelas/ubah','penilaianController@ubahKelas')->name('ubahKelas');

                // HapusKelas
                    Route::post('/kelas/hapus','penilaianController@hapusKelas')->name('hapusKelas');

                // Buka detail Kelas
                    Route::get('/kelas/detail','penilaianController@bukaDetailKelas')->name('bukaDetailKelas');

            // UJIAN
                // Form Input Soal Soal ujian
                    Route::get('ujian/formSoal','ujianController@formInputSoal')->name('formSoal');
                
                // Store Soal Soal ujian
                    Route::get('ujian/formSoal/store','ujianController@storeSoal')->name('storeSoal');
                    
                // Form Ubah Soal Soal ujian
                    Route::get('ujian/formSoal/ubah','ujianController@formEditSoal')->name('formSoalUbah');
                
                // Store Ubah Soal Soal ujian
                    Route::put('ujian/formSoal/ubah/store','ujianController@storeUbahSoal')->name('storeUbahSoal');

                // DetailUjian
                    Route::get('ujian/detailUjian','ujianController@detailUjian')->name('detailUjian');
                
                // HapusUjian
                    Route::post('ujian/hapusUjian','ujianController@hapusUjian')->name('hapusUjian');

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
