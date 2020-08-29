<?php

use App\Mail\SendMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;



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

Route::get('/Admin', function () {
    return view('login');
});

Auth::routes(['verify' => true ]);

// Auth::routes();

//fornt end
Route::get('/', 'FrontController@home');

Route::get('/institutions/register', 'AuthController@register')->name('register');
Route::post('/institutions/postregister', 'AuthController@postregister');
Route::get('/institutions/register/activate/{code}', 'AuthController@activate')->name('register.activate');

Route::get('/institutions/login', 'AuthController@index')->name('login');
Route::post('/institutions/postlogin', 'AuthController@postlogin');
Route::post('/institutions/logout', 'AuthController@logout');



Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    // dashboard
    Route::get('/institutions/dashboard', 'SiswaController@index');
    Route::post('/institutions/dashboard/create', 'SiswaController@create');
    Route::get('/institutions/dashboard/{siswa}/edit', 'SiswaController@edit');
    Route::post('/institutions/dashboard/{siswa}/update', 'SiswaController@update');
    Route::get('/institutions/dashboard/{siswa}/delete', 'SiswaController@delete');

    // mystudent upload
    Route::post('/institutions/dashboard/importxlsx', 'SiswaController@imporexel')->name('siswa.import');

});


Route::group(['middleware' => ['auth', 'checkRole:admin, siswa']], function() {
    // dashboard
    Route::get('/institutions/dashboard', 'SiswaController@index');
});



// Route::get('kirimemail', function () {
//     Mail::raw('Hallo User Baru', function ($message) {
//         $message->to('suucek27@gmail.com', 'Suu Cek');
//         $message->subject('Pendaftaran Institusi');
//     });
// });


// Auth::routes();


//back end

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', 'HomeController@index')->name('home');
//     Route::resource('categori', 'CategoriController');
//     Route::resource('artikel', 'ArtikelController');
// });
