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

Route::get('/admin/{type}', function ($type) {
    return view('collection', [
        'type' => $type,
        'resources' => Cms::getMagicResources(),
        'collection' => Cms::getResourceClass($type)::all(),
    ]);
});

Route::get('/admin/{type}/{id}', function ($type, $id) {
    return view('resource', [
        'type' => $type,
        'id' => $id,
        'resources' => Cms::getMagicResources(),
        'resource' => Cms::getResourceClass($type)::findOrFail($id),
    ]);
});
