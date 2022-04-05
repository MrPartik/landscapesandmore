<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});
Route::get('/process', function () {
    return view('front.process');
});
Route::get('/projects', function () {
    return view('front.projects');
});

Route::get('/blog', function () {
    return view('front.blog');
});

Route::get('/contact-us', function () {
    return view('front.contact-us');
});

Route::get('/warranty', function () {
    return view('front.warranty');
});

Route::get('test', function () {
    return (new \App\Services\VerifyContactStreak(new \App\Http\StreakApi\StreakFunctions(new \GuzzleHttp\Client())))->checkEmail(request()->get('email'));
});


