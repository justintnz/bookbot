<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/info', function () {
    phpinfo();
});

Route::post('/tokens/create', function (Request $request) {
    return  json_encode(['token' => csrf_token()]);
});

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    Artisan::call('view:clear');
    Artisan::call('route:clear');

    exec('rm -f ' . storage_path('logs/laravel.log'));

    return 'Logs and cache are cleared';
})->name('clear.cache');
