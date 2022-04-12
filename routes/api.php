<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload-image', function () {
    $oFile = request()->file('file-0');
    $sFeaturedImagePath = $oFile->storeAs('public', 'blog/images/uploaded-' . time() . '.' . $oFile->getClientOriginalExtension());
    $sFeaturedImagePath = '/' . str_replace('public', 'storage', $sFeaturedImagePath);
    return [
        'state' => 200,
        'result' => [
            [
                'url' => $sFeaturedImagePath,
            ]
        ]
    ];
});

Route::get('/get-uploaded-images', function () {
    return [
        'state' => 500,
        'result' => [
            'tag' => 'a,b,c,d',
            'name' => 'a,b,c,d',
            'url' => 'a,b,c,d',
        ]
    ];
});
