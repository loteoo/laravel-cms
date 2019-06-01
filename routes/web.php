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

Route::get('/', function () {



    return Movie::getResourceType();
});

    Route::get('/admin', function () {


    $modelNamespace = 'MagicResources';
    $resources = collect(File::allFiles(app_path($modelNamespace)))->map(function ($absPath) {
        return $absPath;
    });


    return view('admin', [
        'resources' => $resources
    ]);
});
