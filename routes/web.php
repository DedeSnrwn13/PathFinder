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

Auth::routes(['verify' => true ]);

// Auth::routes();

//fornt end
Route::get('/', 'FrontController@home')->name('landing');

Route::get('/signup', 'FrontController@register_landing');
Route::get('/signin', 'FrontController@login_landing');

Route::get('/institutions/register', 'AuthController@register')->name('register');
Route::post('/institutions/postregister', 'AuthController@postregister')->name('post.register');
Route::get('/institutions/register/activate/{code}', 'AuthController@activate')->name('register.activate');

Route::get('/institutions/login', 'AuthController@login')->name('login');
Route::post('/institutions/postlogin', 'AuthController@postlogin')->name('post.login');

// Route::get('/employer/talentsearch/profile', 'ProfileController@index');
// Route::get('/employer/talentsearch/profile/project', 'ProfileController@project');
// Route::get('/employer/talentsearch/profile/backgroundeducation', 'ProfileController@backedu');
// Route::get('/employer/talentsearch/profile/professionalskills', 'ProfileController@skills');
// Route::get('/employer/talentsearch/profile/basicassessment', 'ProfileController@basic');
// Route::get('/employer/talentsearch/profile/advancedassessment', 'ProfileController@advance');


Route::group(['middleware' => ['auth', 'CheckRole:institution']], function() {
    // dashboard
    Route::get('/institutions/dashboard', 'SiswaController@index')->name('institution.dashboard');
    Route::get('/institutions/dashboard/add', 'SiswaController@add');
    Route::post('/institutions/dashboard/postcreate', 'SiswaController@postcreate')->name('institution.create.applicant.data');
    Route::get('/institutions/dashboard/{pelamar}/edit', 'SiswaController@edit');
    Route::post('/institutions/dashboard/{pelamar}/update', 'SiswaController@update');
    Route::get('/institutions/dashboard/{pelamar}/delete', 'SiswaController@delete');

    //logout
    Route::get('/institutions/logout', 'AuthController@logout')->name('institution.logout');

    // mystudent download
    // Route::get('/institutions/dashboard/downloadxlsx', 'SiswaController@downloadexcel');
    // mystudent upload
    Route::post('/institutions/dashboard/importxlsx', 'SiswaController@importexcel')->name('siswa.import');

});

Route::get('getdatasiswa', 'SiswaController@getdatasiswa')->name('ajax.get.data.siswa');

Route::get('jobseekers/signin', 'JobseekersController@signin_jobs')->name('jobseekers.signin');
Route::post('jobseekers/postsignin', 'JobseekersController@post_sign_jobs')->name('jobseekers.post.signin');


Route::group(['middleware' => ['auth', 'CheckRole:pelamar']], function() {
    // job seekers
    Route::get('/jobseeker/online', function () {
        return view('jobseekers.onlinetesting.onlinetesting');
    });

    Route::get('/jobseeker/online-testing', function () {
        return view('jobseekers.onlinetesting.onlineinterview');
    });

    Route::get('/jobseeker/online-testing-result', function () {
        return view('jobseekers.onlinetesting.onlinetestingresult');
    });

    Route::get('/jobseeker/online-interview', function () {
        return view('jobseekers.onlinetesting.onlineinterview');
    });

    Route::get('/jobseeker/online-interview-video', function () {
        return view('jobseekers.onlinetesting.onlineinterviewvideo');
    });

    // profile
    Route::get('/jobseeker/profile', 'ProfileController@index_profile');
    Route::post('/jobseeker/profile/{id}/update', 'ProfileController@about_update');

    Route::get('/jobseeker/profile/project', 'ProfileController@project');
    Route::post('/jobseeker/profile/project/{id}/update', 'ProfileController@project_update');

    Route::get('/jobseeker/profile/backgroundeducation', 'ProfileController@backedu');

    Route::get('/jobseeker/profile/professionalskills', 'ProfileController@skills');
    Route::post('/jobseeker/profile/professionalskills/{id}/update', 'ProfileController@skills_update');

    Route::get('/jobseeker/profile/basicassessment', 'ProfileController@basic');
    Route::get('/jobseeker/profile/advancedassessment', 'ProfileController@advance');

    // edit
    Route::get('/jobseeker/profile/{id}/edit', 'ProfileController@edit_profile');
    Route::get('/jobseeker/profile/project/{id}/edit', 'ProfileController@edit_project');
    Route::get('/jobseeker/profile/professionalskills/{id}/update', 'ProfileController@edit_skills');

    //logout
    Route::get('/jobseeker/logout', 'JobseekersController@logout_job')->name('jobseeker.logout');

});



// login system employers
// Route::get('/employer/signup', 'EmployerAuthController@getRegister');
// Route::post('/employer/signup', 'EmployerAuthController@postRegister')->name('register');

// Route::get('/employer/signin', 'EmployerAuthController@getLogin')->name('login');
// Route::post('/postlogin', 'EmployerAuthController@postlogin');
// Route::get('/logout', 'EmployerAuthController@logout');

// Route::group(['middleware' => ['auth', 'checkRole:employer']], function() {
//     // employers - job vacancy
//     Route::resource('/employer/jobvacancy/apllicant', 'JobVacancyController');
//     Route::resource('/employer/jobvacancy/candidate', 'CandidateController');
//     Route::resource('/employer/jobvacancy/onlineinterview', 'OnlineInterviewController');
//     Route::resource('/employer/jobvacancy/onlinetesting', 'OnlineTestingController');


//     // employers - talent search
//     Route::get('/employer/talentsearch', 'TalentSearchController@index');
//     Route::get('/employer/talentsearch/profile', 'ProfileController@index');
//     Route::get('/employer/talentsearch/{pelamar}/kirim_pdf', 'TalentSearchController@kirim_pdf');
//     Route::get('/employer/talentsearch/cari', 'TalentSearchController@cari');

//     Route::get('/employer/talentsearch', 'TalentSearchController@index');
//     Route::get('/employer/talentsearch/profile/project', 'ProfileController@project');
//     Route::get('/employer/talentsearch/{pelamar}/kirim_pdf', 'TalentSearchController@kirim_pdf');
//     Route::get('/employer/talentsearch/cari', 'TalentSearchController@cari');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
