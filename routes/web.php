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

Route::get('test', function () {
    return (new \App\Services\VerifyContactStreak(new \App\Http\StreakApi\StreakFunctions(new \GuzzleHttp\Client())))->checkEmail(request()->get('email'));
});

Route::get('js/google-api/maps.js', function () {
    return file_get_contents('https://maps.googleapis.com/maps/api/js?key=' . config('google.api_key') . '&callback=initAutocomplete&libraries=places&v=weekly');
});


Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function() {

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/our-process', function () {
        return view('admin.our-process');
    })->name('admin.our_process');

    Route::get('/blog', function () {
        return view('admin.blog');
    })->name('admin.blog');

    Route::get('/blog/edit/{id}', function ($id) {
        return view('admin.blog-edit');
    })->name('admin.blog-edit');

    Route::get('/contact-us', function () {
        return view('admin.contact-us');
    })->name('admin.contact_us');

    Route::get('/warranty', function () {
        return view('admin.warranty');
    })->name('admin.warranty');

    Route::get('/projects', function () {
        return view('admin.projects');
    })->name('admin.projects');

    Route::get('/pre-defined-values', function () {
        return view('admin.pre-defined-values');
    })->name('admin.pre-defined-values');

    Route::get('/awards', function () {
        return view('admin.awards');
    })->name('admin.awards');
});
