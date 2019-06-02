<?php

use App\MagicResources\Movie;

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


use App\Cms;

Route::get('/', function () {
    return Movie::getResourceType();
});

Route::get('/admin', function () {




    return view('admin', [
        'resources' => Cms::getMagicResources()
    ]);
});
