"use strict";

var mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css').sass('resources/sass/app-two.scss', 'public/css').sass('resources/sass/institutions-landing.scss', 'public/css').sass('resources/sass/institutions-signup.scss', 'public/css').sass('resources/sass/institutions-signin.scss', 'public/css').sass('resources/sass/institutions-mystudents.scss', 'public/css').sass('resources/sass/institutions-mystudents-edit.scss', 'public/css').sass('resources/sass/bg.scss', 'public/css').sass('resources/sass/profile.scss', 'public/css').sass('resources/sass/pro.scss', 'public/css').sass('resources/sass/talentsearch.scss', 'public/css').sass('resources/sass/style.scss', 'public/css').sass('resources/sass/navbar.scss', 'public/css').sass('resources/sass/candidate.scss', 'public/css').sass('resources/sass/jobvacancy.scss', 'public/css').sass('resources/sass/login_employer.scss', 'public/css').sass('resources/sass/onlineinterview.scss', 'public/css').sass('resources/sass/onlineinterviewvideo.scss', 'public/css').sass('resources/sass/onlinetesting.scss', 'public/css').sass('resources/sass/onlinetestingresult.scss', 'public/css').sass('resources/sass/register_employer.scss', 'public/css').sass('resources/sass/signup.scss', 'public/css').sass('resources/sass/jobseekers-signin.scss', 'public/css').sass('resources/sass/style_black.scss', 'public/css').sass('resources/sass/pilihan.scss', 'public/css').sass('resources/sass/app-admin.scss', 'public/css');