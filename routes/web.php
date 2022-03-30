<?php

use App\Models\ProjectTypes;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('test', function () {
    return \App\Models\Projects::with('user', 'projectType')->where('is_active', '!=', 0)->get();
});
