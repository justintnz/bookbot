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
    if (null !== $request->user()) {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    }
    return ['message' => 'please login first'];
});
