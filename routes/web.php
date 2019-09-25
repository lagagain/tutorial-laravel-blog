<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return '<h1>Hello</h1>';
});

Route::any('/hello-world/', function () {
    return '<h1>Hello, World</h1>';
});

Route::get('/hello', function (Request $request) {
    return '<h1>Hello,'.$request->query('name').'</h1>';
});

Route::get('/hello/{name}', function ($name) {
    return '<h1>Hello, '.$name.'</h1>';
});
