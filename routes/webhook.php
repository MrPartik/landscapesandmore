<?php

use Illuminate\Support\Facades\Route;

Route::post('/box/change-stage', function () {
    \Illuminate\Support\Facades\Log::info('box-change-stage', request()->all());
});
